<?php

namespace App\Console\Commands;

use App\Models\SeoPage;
use App\Support\Interlink;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class SeoAudit extends Command
{
    protected $signature = 'seo:audit';

    protected $description = 'Pre-publish checks: slug collisions, orphan pages, noindex, thin content';

    public function handle(): int
    {
        $problems = 0;

        // 1. Collision with an existing live URL.
        $existing = collect(Route::getRoutes())
            ->map(fn ($r) => '/' . ltrim($r->uri(), '/'))
            ->reject(fn ($u) => str_contains($u, '{'))
            ->unique();

        $this->components->info('Slug collisions');
        foreach (SeoPage::all() as $page) {
            $path = '/' . ltrim($page->url_path, '/');

            // Fleet rows deliberately attach to the existing /fleet/{slug} pages
            // rather than creating new URLs, so they are not collisions.
            if ($page->type === 'fleet') {
                continue;
            }

            if ($existing->contains($path) && ! str_starts_with($path, '/directions')) {
                $this->error("  COLLISION  {$path}");
                $problems++;
            }
        }
        $duplicates = SeoPage::selectRaw('url_path, COUNT(*) c')->groupBy('url_path')->havingRaw('c > 1')->pluck('url_path');
        foreach ($duplicates as $duplicate) {
            $this->error("  DUPLICATE  {$duplicate}");
            $problems++;
        }
        if (! $problems) {
            $this->line('  none');
        }

        // 2. Orphans - fewer than 3 inbound internal links.
        $this->components->info('Orphan pages (under ' . Interlink::MIN_INBOUND . ' inbound links)');
        $orphans = Interlink::auditInbound();
        foreach ($orphans as $path => $count) {
            $this->warn("  {$path} has {$count} inbound");
            $problems++;
        }
        if (! $orphans) {
            $this->line('  none');
        }

        // 3. noindex still switched on.
        $this->components->info('Pages still set to noindex');
        $noindex = SeoPage::published()->where('noindex', true)->pluck('url_path');
        foreach ($noindex as $path) {
            $this->warn("  {$path}");
            $problems++;
        }
        if ($noindex->isEmpty()) {
            $this->line('  none');
        }

        // 4. Content quality gates.
        $this->components->info('Content gates');
        foreach (SeoPage::published()->get() as $page) {
            $issues = [];

            if ($page->answer_word_count < 40 || $page->answer_word_count > 60) {
                $issues[] = "answer block {$page->answer_word_count}w";
            }
            $minWords = $page->type === 'fleet' ? 300 : 700;
            if ($page->word_count < $minWords) {
                $issues[] = "body {$page->word_count}w (min {$minWords})";
            }
            if (count((array) $page->faqs) < 3) {
                $issues[] = 'under 3 FAQs';
            }
            if (count((array) $page->sources) < 2) {
                $issues[] = 'under 2 sources';
            }
            if (! $page->reviewer_name || ! $page->reviewed_at) {
                $issues[] = 'no reviewer byline';
            }

            if ($issues) {
                $this->warn('  ' . $page->url_path . ' - ' . implode(', ', $issues));
                $problems++;
            }
        }

        $this->newLine();
        $problems
            ? $this->error("{$problems} issue(s) to fix before publishing.")
            : $this->info('All checks passed.');

        return $problems ? self::FAILURE : self::SUCCESS;
    }
}
