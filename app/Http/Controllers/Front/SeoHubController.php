<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;

class SeoHubController extends Controller
{
    protected function hubs(): array
    {
        return [
            'services' => [
                'type'  => SeoPage::TYPE_SERVICE,
                'h1'    => 'Our Chauffeur and Car Hire Services',
                'title' => 'Chauffeur Services | Heathrow, Weddings, Corporate | Suave',
                'desc'  => 'Chauffeur-driven services from our Hayes base: Heathrow transfers, executive corporate travel, wedding cars and luxury car hire across London.',
                'intro' => 'Every service below runs from our base in Hayes, ten minutes from Heathrow. Pick the one that matches your journey for pricing, vehicles and what is included.',
            ],
            'chauffeur-hire' => [
                'type'  => SeoPage::TYPE_AREA,
                'h1'    => 'Chauffeur Hire by Area',
                'title' => 'Chauffeur Hire in West London and Berkshire | Suave',
                'desc'  => 'Local chauffeur hire across West London, Berkshire and Surrey. Choose your area for postcodes covered, Heathrow times and typical journeys.',
                'intro' => 'We are based in Hayes, so most of these areas are a short positioning run rather than a cross-London trek. Pick your area for local detail.',
            ],
            'transfers' => [
                'type'  => SeoPage::TYPE_ROUTE,
                'h1'    => 'Heathrow Transfer Routes',
                'title' => 'Heathrow Transfers | Routes and Journey Times | Suave',
                'desc'  => 'Chauffeur-driven Heathrow transfers to central London, Mayfair, Canary Wharf, Windsor, Oxford, Reading and Gatwick. Flight tracking on every route.',
                'intro' => 'Each route below has its own page with distance, typical journey time and what affects the price. All include flight tracking and waiting time.',
            ],
            'luxury-car-hire' => [
                'type'  => SeoPage::TYPE_HIRE,
                'h1'    => 'Self-Drive Luxury and Supercar Hire',
                'title' => 'Luxury and Supercar Hire | Self-Drive | Suave',
                'desc'  => 'Self-drive luxury and supercar hire from Hayes. Lamborghini, Ferrari, Bentley and Range Rover, with delivery across West London.',
                'intro' => 'Self-drive hire from our Hayes base, with delivery available. Choose an area below for local collection and delivery detail.',
            ],
            'wedding-car-hire' => [
                'type'  => SeoPage::TYPE_WEDDING,
                'h1'    => 'Wedding Car Hire by Area',
                'title' => 'Wedding Car Hire | Rolls-Royce and Bentley | Suave',
                'desc'  => 'Wedding car hire across London and the Thames Valley. Rolls-Royce, Bentley and vintage cars with ribbons and a chauffeur in morning dress.',
                'intro' => 'Pick your area for the local venues we know, timings and what is included on the day.',
            ],
        ];
    }

    public function show(string $hub)
    {
        $hubs = $this->hubs();

        abort_unless(isset($hubs[$hub]), 404);

        $config = $hubs[$hub];

        $pages = SeoPage::published()->type($config['type'])->orderBy('h1')->get();

        abort_if($pages->isEmpty(), 404);

        return view('front.seo.hub', compact('hub', 'config', 'pages'));
    }
}
