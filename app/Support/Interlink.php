<?php

namespace App\Support;

use App\Models\Product;
use App\Models\SeoPage;
use Illuminate\Support\Collection;

/**
 * Internal linking engine.
 *
 * Implements rules R1-R8 and geographic clusters C1-C5 from the SEO build sheet.
 * Every link block on a page is produced here so that link counts stay
 * auditable and no page is left an orphan.
 */
class Interlink
{
    /** C1-C5: an area page links ACROSS only to the areas in its own cluster. */
    public const CLUSTERS = [
        'C1' => ['hayes', 'uxbridge', 'ruislip', 'greenford'],
        'C2' => ['southall', 'ealing', 'hounslow', 'feltham'],
        'C3' => ['slough', 'windsor', 'ascot', 'gerrards-cross'],
        'C4' => ['richmond', 'twickenham', 'staines-upon-thames'],
        'C5' => ['harrow', 'wembley', 'watford'],
    ];

    /** Minimum inbound internal links before a page is considered safe to publish. */
    public const MIN_INBOUND = 3;

    public static function clusterFor(string $slug): ?string
    {
        foreach (self::CLUSTERS as $key => $slugs) {
            if (in_array($slug, $slugs, true)) {
                return $key;
            }
        }

        return null;
    }

    /** R3 / R4: nearest sibling areas, same cluster only. */
    public static function nearbyAreas(SeoPage $page, int $limit = 3): Collection
    {
        $cluster = $page->cluster ?: self::clusterFor($page->slug);

        if (! $cluster) {
            return collect();
        }

        $siblings = array_values(array_diff(self::CLUSTERS[$cluster], [$page->slug]));

        return SeoPage::published()
            ->where('type', $page->type)
            ->whereIn('slug', $siblings)
            ->orderBy('sort')
            ->limit($limit)
            ->get();
    }

    /** R2 / R3 / R4: the parent service hub. */
    public static function hub(SeoPage $page): ?SeoPage
    {
        if (! $page->hub_slug) {
            return null;
        }

        return SeoPage::published()->type(SeoPage::TYPE_SERVICE)
            ->where('slug', $page->hub_slug)
            ->first();
    }

    /** R2: the other service hubs, for hub-to-hub links. */
    public static function siblingHubs(?SeoPage $page = null, int $limit = 4): Collection
    {
        return SeoPage::published()->type(SeoPage::TYPE_SERVICE)
            ->when($page, function ($query) use ($page) {
                // Exclude the page itself, and the hub it already links UP to,
                // so the same hub never appears in two link blocks on one page.
                $query->where('id', '!=', $page->id);

                if ($page->hub_slug) {
                    $query->where('slug', '!=', $page->hub_slug);
                }
            })
            ->orderBy('sort')
            ->limit($limit)
            ->get();
    }

    /** R2: every child page belonging to a hub. */
    public static function children(SeoPage $hub): Collection
    {
        return SeoPage::published()
            ->where('hub_slug', $hub->slug)
            ->orderBy('sort')
            ->get();
    }

    /** R3: route pages relevant to an area. R4: similar routes for a route page. */
    public static function relatedRoutes(SeoPage $page, int $limit = 2): Collection
    {
        $query = SeoPage::published()->type(SeoPage::TYPE_ROUTE)
            ->where('id', '!=', $page->id);

        if ($page->type === SeoPage::TYPE_ROUTE && $page->route_from) {
            $query->where('route_from', $page->route_from);
        } elseif ($page->area_name) {
            $area = $page->area_name;
            $query->where(function ($q) use ($area) {
                $q->where('route_to', 'like', "%{$area}%")
                  ->orWhere('route_from', 'like', "%{$area}%");
            });
        }

        $routes = $query->orderBy('sort')->limit($limit)->get();

        // Never return an empty block - fall back to the top routes so the
        // page still meets its minimum outbound link count.
        if ($routes->count() < $limit) {
            $routes = $routes->merge(
                SeoPage::published()->type(SeoPage::TYPE_ROUTE)
                    ->where('id', '!=', $page->id)
                    ->whereNotIn('id', $routes->pluck('id'))
                    ->orderBy('sort')
                    ->limit($limit - $routes->count())
                    ->get()
            );
        }

        return $routes;
    }

    /** R4: both endpoint area pages of a route, when they exist. */
    public static function endpointAreas(SeoPage $route): Collection
    {
        $names = array_filter([$route->route_from, $route->route_to]);

        if (! $names) {
            return collect();
        }

        return SeoPage::published()
            ->whereIn('type', [SeoPage::TYPE_AREA, SeoPage::TYPE_WEDDING])
            ->where(function ($q) use ($names) {
                foreach ($names as $name) {
                    $q->orWhere('area_name', $name);
                }
            })
            ->get();
    }

    /**
     * Manually curated internal links held in related_paths.
     * Used for pages that sit outside the cluster rules — /directions being
     * the obvious one, since no geographic cluster owns it.
     */
    public static function relatedPages(SeoPage $page): Collection
    {
        $paths = array_filter((array) $page->related_paths);

        if (! $paths) {
            return collect();
        }

        return SeoPage::published()
            ->whereIn('url_path', $paths)
            ->where('id', '!=', $page->id)
            ->orderBy('sort')
            ->get();
    }

    /** R2-R5: existing /fleet/{slug} vehicles to link DOWN to. */
    public static function fleet(SeoPage $page, int $limit = 3): Collection
    {
        $slugs = (array) $page->fleet_slugs;

        if (! $slugs) {
            return collect();
        }

        return Product::query()
            ->whereIn('slug', $slugs)
            ->limit($limit)
            ->get();
    }

    /**
     * Orphan check. Returns every published page with fewer than MIN_INBOUND
     * inbound internal links, so it can be fixed before it is submitted.
     */
    public static function auditInbound(): array
    {
        $pages = SeoPage::published()->get();
        $inbound = [];

        foreach ($pages as $page) {
            $inbound[$page->url_path] = 0;
        }

        foreach ($pages as $page) {
            foreach (self::outboundPaths($page) as $path) {
                if (array_key_exists($path, $inbound)) {
                    $inbound[$path]++;
                }
            }
        }

        return array_filter($inbound, fn ($count) => $count < self::MIN_INBOUND);
    }

    /** Every internal seo_pages path a given page links out to. */
    public static function outboundPaths(SeoPage $page): array
    {
        $paths = collect()
            ->merge(self::nearbyAreas($page, 3)->pluck('url_path'))
            ->merge(self::relatedRoutes($page, 2)->pluck('url_path'))
            ->merge(self::siblingHubs($page, 4)->pluck('url_path'))
            ->merge((array) $page->related_paths);

        if ($hub = self::hub($page)) {
            $paths->push($hub->url_path);
        }

        if ($page->type === SeoPage::TYPE_SERVICE) {
            $paths = $paths->merge(self::children($page)->pluck('url_path'));
        }

        if ($page->type === SeoPage::TYPE_ROUTE) {
            $paths = $paths->merge(self::endpointAreas($page)->pluck('url_path'));
        }

        // Vehicle cards link out to the existing /fleet/{slug} pages. Counting
        // them keeps the orphan audit honest for fleet rows, and shows which
        // vehicles are not yet featured anywhere.
        foreach (self::fleet($page, 6) as $vehicle) {
            if (! empty($vehicle->slug)) {
                $paths->push('fleet/' . $vehicle->slug);
            }
        }

        return $paths->filter()->unique()->values()->all();
    }
}
