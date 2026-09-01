<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;

class SeoHubController extends Controller
{
    /** Hub copy lives in config/seo_hubs.php so it can be edited without touching code. */
    public function show(string $hub)
    {
        $config = config('seo_hubs.' . $hub);

        abort_unless(is_array($config), 404);

        $pages = SeoPage::published()->type($config['type'])->orderBy('h1')->get();

        // An empty hub is worse than no hub - keep it a 404 until it has children.
        abort_if($pages->isEmpty(), 404);

        return view('front.seo.hub', compact('hub', 'config', 'pages'));
    }
}
