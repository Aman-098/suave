<?php

namespace App\Console\Commands;

use App\Models\SeoPage;
use App\Support\Interlink;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SeoImport extends Command
{
    protected $signature = 'seo:import
                            {path=storage/app/seo : Directory or single .json file to import}
                            {--publish : Publish each imported page immediately}
                            {--dry-run : Validate only, write nothing}';

    protected $description = 'Import or update SEO landing pages from JSON content files';

    public function handle(): int
    {
        $path = base_path($this->argument('path'));

        $files = File::isDirectory($path)
            ? collect(File::files($path))->filter(fn ($f) => $f->getExtension() === 'json')->map->getPathname()->values()->all()
            : [$path];

        if (! $files || ! File::exists($files[0])) {
            $this->error("Nothing to import at {$path}");
            return self::FAILURE;
        }

        $created = $updated = $skipped = 0;

        foreach ($files as $file) {
            $decoded = json_decode(File::get($file), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error(basename($file) . ': invalid JSON - ' . json_last_error_msg());
                $skipped++;
                continue;
            }

            $records = isset($decoded['url_path']) ? [$decoded] : $decoded;

            foreach ($records as $record) {
                if (empty($record['url_path']) || empty($record['type']) || empty($record['slug'])) {
                    $this->error(basename($file) . ': record missing type, slug or url_path');
                    $skipped++;
                    continue;
                }

                foreach ($this->warnings($record) as $warning) {
                    $this->warn($record['url_path'] . ': ' . $warning);
                }

                if ($this->option('dry-run')) {
                    $this->line('  would import ' . $record['url_path']);
                    continue;
                }

                if (empty($record['cluster']) && ! empty($record['slug'])) {
                    $record['cluster'] = Interlink::clusterFor($record['slug']);
                }

                if ($this->option('publish')) {
                    $record['is_published'] = true;
                }

                $existing = SeoPage::where('url_path', $record['url_path'])->first();

                SeoPage::updateOrCreate(['url_path' => $record['url_path']], $record);

                $existing ? $updated++ : $created++;
                $this->info(($existing ? 'updated  ' : 'created  ') . $record['url_path']);
            }
        }

        $this->newLine();
        $this->info("Created {$created}, updated {$updated}, skipped {$skipped}.");

        return self::SUCCESS;
    }

    /** Editorial guard rails, applied at import time rather than after publishing. */
    protected function warnings(array $record): array
    {
        $warnings = [];

        $answerWords = str_word_count(strip_tags($record['answer_block'] ?? ''));
        if ($answerWords < 40 || $answerWords > 60) {
            $warnings[] = "direct-answer block is {$answerWords} words (target 40-60)";
        }

        $title = $record['meta_title'] ?? '';
        if (strlen($title) > 60) {
            $warnings[] = 'meta title is ' . strlen($title) . ' characters (target under 60)';
        }

        $description = $record['meta_description'] ?? '';
        if (strlen($description) > 160) {
            $warnings[] = 'meta description is ' . strlen($description) . ' characters (target under 160)';
        }

        if (count($record['faqs'] ?? []) < 3) {
            $warnings[] = 'fewer than 3 FAQs - FAQPage schema will be weak';
        }

        if (count($record['sources'] ?? []) < 2) {
            $warnings[] = 'fewer than 2 external sources';
        }

        if (empty($record['reviewer_name']) || empty($record['reviewed_at'])) {
            $warnings[] = 'missing reviewer byline or review date';
        }

        $body = ($record['intro'] ?? '') . ' ' . collect($record['sections'] ?? [])
            ->map(fn ($s) => ($s['h2'] ?? '') . ' ' . ($s['html'] ?? ''))->implode(' ');
        $words = str_word_count(strip_tags($body));
        $minWords = ($record['type'] ?? '') === 'fleet' ? 300 : 700;
        if ($words < $minWords) {
            $warnings[] = "body is {$words} words (minimum {$minWords} for this page type)";
        }

        return $warnings;
    }
}
