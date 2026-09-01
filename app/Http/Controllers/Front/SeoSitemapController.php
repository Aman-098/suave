<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;

class SeoSitemapController extends Controller
{
    public function index()
    {
        $pages = SeoPage::published()
            ->where('noindex', false)
            ->where('type', '!=', 'fleet')
            ->orderBy('type')
            ->orderBy('sort')
            ->get();

        $priority = [
            SeoPage::TYPE_SERVICE    => '0.9',
            SeoPage::TYPE_AREA       => '0.8',
            SeoPage::TYPE_WEDDING    => '0.8',
            SeoPage::TYPE_HIRE       => '0.8',
            SeoPage::TYPE_ROUTE      => '0.7',
            SeoPage::TYPE_DIRECTIONS => '0.6',
        ];

        // Hub pages: only listed when they actually have children (they 404 otherwise).
        $hubMap = [
            'services'         => SeoPage::TYPE_SERVICE,
            'chauffeur-hire'   => SeoPage::TYPE_AREA,
            'transfers'        => SeoPage::TYPE_ROUTE,
            'luxury-car-hire'  => SeoPage::TYPE_HIRE,
            'wedding-car-hire' => SeoPage::TYPE_WEDDING,
        ];

        $hubs = [];

        foreach ($hubMap as $slug => $type) {
            $children = $pages->where('type', $type);

            if ($children->isEmpty()) {
                continue;
            }

            $newest = $children->sortByDesc('updated_at')->first();

            $hubs[] = [
                'loc'     => url('/' . $slug),
                'lastmod' => optional($newest?->updated_at)->toAtomString(),
            ];
        }

        $xml = view('front.seo.sitemap', compact('pages', 'priority', 'hubs'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
