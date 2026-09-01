<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;
use App\Support\Interlink;

class SeoPageController extends Controller
{
    public function service(string $slug)
    {
        return $this->render(SeoPage::TYPE_SERVICE, $slug);
    }

    public function area(string $slug)
    {
        return $this->render(SeoPage::TYPE_AREA, $slug);
    }

    public function wedding(string $slug)
    {
        return $this->render(SeoPage::TYPE_WEDDING, $slug);
    }

    public function hire(string $slug)
    {
        return $this->render(SeoPage::TYPE_HIRE, $slug);
    }

    public function route(string $slug)
    {
        return $this->render(SeoPage::TYPE_ROUTE, $slug);
    }

    public function directions()
    {
        return $this->render(SeoPage::TYPE_DIRECTIONS, 'directions');
    }

    protected function render(string $type, string $slug)
    {
        $page = SeoPage::published()
            ->type($type)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('front.seo.page', [
            'page'          => $page,
            'hub'           => Interlink::hub($page),
            'siblingHubs'   => Interlink::siblingHubs($page),
            'children'      => $type === SeoPage::TYPE_SERVICE ? Interlink::children($page) : collect(),
            'nearbyAreas'   => Interlink::nearbyAreas($page),
            'relatedRoutes' => Interlink::relatedRoutes($page),
            'endpointAreas' => $type === SeoPage::TYPE_ROUTE ? Interlink::endpointAreas($page) : collect(),
            'fleet'         => Interlink::fleet($page),
            'relatedPages'  => Interlink::relatedPages($page),
        ]);
    }
}
