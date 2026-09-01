<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;

class SeoSitemapController extends Controller
{
    /**
     * XML sitemap for the pages held in seo_pages.
     * Kept separate from the existing /sitemap.xml so that file is untouched;
     * both are declared in robots.txt, which Google accepts.
     */
    public function index()
    {
        $pages = SeoPage::published()
            ->where('noindex', false)
            ->where('type', '!=', 'fleet')   // fleet rows enrich existing /fleet/ URLs
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

        $xml = view('front.seo.sitemap', compact('pages', 'priority'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
