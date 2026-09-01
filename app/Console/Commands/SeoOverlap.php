<?php

namespace App\Console\Commands;

use App\Models\SeoPage;
use Illuminate\Console\Command;

/**
 * Near-duplicate detector.
 *
 * The build sheet requires related pages to be at least 70% unique. This
 * measures overlapping five-word phrases between every pair of published
 * pages and reports anything above the threshold, which is how a page set
 * like this accidentally turns into doorway pages.
 */
class SeoOverlap extends Command
{
    protected $signature = 'seo:overlap {--threshold=30 : Report pairs above this percentage} {--top=10 : How many pairs to list}';

    protected $description = 'Check published pages for near-duplicate content';

    public function handle(): int
    {
        $pages = SeoPage::published()->get();

        if ($pages->count() < 2) {
            $this->info('Not enough pages to compare.');
            return self::SUCCESS;
        }

        $shingles = [];

        foreach ($pages as $page) {
            $shingles[$page->url_path] = $this->shingles($this->text($page));
        }

        $paths = array_keys($shingles);
        $pairs = [];

        for ($i = 0; $i < count($paths); $i++) {
            for ($j = $i + 1; $j < count($paths); $j++) {
                $a = $shingles[$paths[$i]];
                $b = $shingles[$paths[$j]];

                if (! $a || ! $b) {
                    continue;
                }

                $shared  = count(array_intersect_key($a, $b));
                $smaller = max(1, min(count($a), count($b)));
                $pairs[] = [round($shared / $smaller * 100, 1), $paths[$i], $paths[$j]];
            }
        }

        usort($pairs, fn ($x, $y) => $y[0] <=> $x[0]);

        $threshold = (float) $this->option('threshold');
        $over      = array_filter($pairs, fn ($p) => $p[0] > $threshold);

        $this->components->info("Highest content overlap across {$pages->count()} pages");

        foreach (array_slice($pairs, 0, (int) $this->option('top')) as [$pct, $a, $b]) {
            $line = sprintf('  %5.1f%%  %s  |  %s', $pct, $a, $b);
            $pct > $threshold ? $this->error($line . '   TOO SIMILAR') : $this->line($line);
        }

        $this->newLine();

        if ($over) {
            $this->error(count($over) . " pair(s) above {$threshold}% — rewrite before publishing.");
            return self::FAILURE;
        }

        $this->info("No pair exceeds {$threshold}%. Every page is comfortably unique.");

        return self::SUCCESS;
    }

    protected function text(SeoPage $page): string
    {
        $text = $page->answer_block . ' ' . $page->intro;

        foreach ((array) $page->sections as $section) {
            $text .= ' ' . ($section['h2'] ?? '') . ' ' . ($section['html'] ?? '');
        }

        foreach ((array) $page->faqs as $faq) {
            $text .= ' ' . ($faq['q'] ?? '') . ' ' . ($faq['a'] ?? '');
        }

        return $text;
    }

    /** Set of five-word phrases, keyed for fast intersection. */
    protected function shingles(string $text, int $size = 5): array
    {
        preg_match_all("/[a-z']+/", strtolower(strip_tags($text)), $matches);
        $words = $matches[0];
        $out   = [];

        for ($i = 0; $i + $size <= count($words); $i++) {
            $out[implode(' ', array_slice($words, $i, $size))] = true;
        }

        return $out;
    }
}
