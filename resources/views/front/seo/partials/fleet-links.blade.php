{{-- "Book this for" block — build sheet rule R5.
     Each fleet page links UP to 2 service hubs, ACROSS to 2 area pages and
     DOWN to 2 route pages, chosen from the vehicle's own character.
     Nothing is hard-coded per vehicle, so all 33 fleet pages are covered. --}}
@php
    $vehicleName = strtolower(trim(($fleet->name ?? '')));

    $matches = function (array $needles) use ($vehicleName) {
        foreach ($needles as $needle) {
            if (str_contains($vehicleName, $needle)) {
                return true;
            }
        }
        return false;
    };

    if ($matches(['rolls', 'bentley', 'vintage', 'phantom', 'cullinan', 'dawn', 'ghost'])) {
        $kind  = 'wedding';
        $lead  = 'A wedding and occasion car first and foremost. Here is where people book it.';
        $hubs  = ['wedding-car-hire', 'luxury-car-hire'];
        $areas = ['southall', 'windsor'];
        $trips = ['heathrow-to-windsor', 'heathrow-to-mayfair'];
    } elseif ($matches(['minibus', 'seater', 'transit'])) {
        $kind  = 'group';
        $lead  = 'Built for groups and luggage. The journeys it earns its keep on:';
        $hubs  = ['heathrow-airport-transfers', 'executive-chauffeur-hire'];
        $areas = ['hayes', 'hounslow'];
        $trips = ['heathrow-to-gatwick', 'heathrow-to-central-london'];
    } elseif ($matches(['lamborghini', 'ferrari', 'mclaren', 'porsche', 'urus', 'huracan', 'aventador',
                        'revuelto', 'temerario', 'purosangue', 'r8', 'svr', 'x6m', 'rsq8', 'g63', 'v8'])) {
        $kind  = 'supercar';
        $lead  = 'Self-drive or chauffeur-driven. Where this one usually goes:';
        $hubs  = ['luxury-car-hire', 'wedding-car-hire'];
        $areas = ['hayes', 'uxbridge'];
        $trips = ['heathrow-to-mayfair', 'heathrow-to-central-london'];
    } else {
        $kind  = 'executive';
        $lead  = 'An executive car for business travel and airport work. Common bookings:';
        $hubs  = ['executive-chauffeur-hire', 'heathrow-airport-transfers'];
        $areas = ['slough', 'richmond'];
        $trips = ['heathrow-to-canary-wharf', 'heathrow-to-reading'];
    }

    $pick = function (string $type, array $slugs) {
        if (! class_exists(\App\Models\SeoPage::class)) {
            return collect();
        }

        return \App\Models\SeoPage::query()
            ->where('is_published', true)
            ->where('type', $type)
            ->whereIn('slug', $slugs)
            ->get();
    };

    $bookHubs  = $pick('service', $hubs);
    $bookAreas = $pick('area', $areas);
    $bookTrips = $pick('route', $trips);
    $bookTotal = $bookHubs->count() + $bookAreas->count() + $bookTrips->count();
@endphp

@if($bookTotal)
<section class="fleet-booklinks">
    <style>
        .fleet-booklinks{padding:56px 0;border-top:1px solid rgba(255,255,255,.09)}
        .fleet-booklinks .fb-inner{max-width:1140px;margin:0 auto;padding:0 20px}
        .fleet-booklinks h2{color:#fff;font-size:26px;font-weight:700;margin:0 0 10px;text-transform:none!important}
        .fleet-booklinks .fb-lead{color:#86898E;font-size:16px;line-height:1.7;margin:0 0 28px;max-width:640px}
        .fb-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:28px}
        .fb-col h3{color:#fff;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.12em;margin:0 0 12px}
        .fb-col ul{list-style:none;padding:0;margin:0}
        .fb-col li{margin:0 0 10px}
        .fb-col a{color:#C9A765;font-size:15px;text-decoration:none}
        .fb-col a:hover{color:#fff;text-decoration:underline}
        @media(max-width:767px){.fleet-booklinks{padding:36px 0}.fleet-booklinks h2{font-size:22px}}
    </style>

    <div class="fb-inner">
        <h2>Book this for</h2>
        <p class="fb-lead">{{ $lead }}</p>

        <div class="fb-grid">
            @if($bookHubs->count())
                <div class="fb-col">
                    <h3>Our services</h3>
                    <ul>
                        @foreach($bookHubs as $item)
                            <li><a href="{{ url('/' . ltrim($item->url_path, '/')) }}">{{ $item->h1 }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($bookAreas->count())
                <div class="fb-col">
                    <h3>Areas we cover</h3>
                    <ul>
                        @foreach($bookAreas as $item)
                            <li><a href="{{ url('/' . ltrim($item->url_path, '/')) }}">{{ $item->h1 }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($bookTrips->count())
                <div class="fb-col">
                    <h3>Popular transfers</h3>
                    <ul>
                        @foreach($bookTrips as $item)
                            <li><a href="{{ url('/' . ltrim($item->url_path, '/')) }}">{{ $item->h1 }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
@endif
