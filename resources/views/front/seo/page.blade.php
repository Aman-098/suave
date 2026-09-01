@extends('front.common.layout')

@section('title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)
@section('og_image', $page->og_image ? asset($page->og_image) : asset('assets_front/images/logo/logo.png'))

@section('schema')
@if($page->noindex)
    <meta name="robots" content="noindex, follow">
@else
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
@endif

@php
    $baseUrl = rtrim(config('app.url') ?: url('/'), '/');

    $localBusiness = [
        '@type'    => ['LocalBusiness', 'AutoRental'],
        '@id'      => $baseUrl . '/#organisation',
        'name'     => 'Suave Executive Travel',
        'url'      => $baseUrl,
        'telephone' => '+448081680808',
        'priceRange' => '£££',
        'foundingDate' => '2022',
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '10:00',
                'closes'    => '19:00',
            ],
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens'     => '10:00',
                'closes'    => '18:00',
            ],
        ],
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Floor 1, Office 7, 3 Uxbridge Road',
            'addressLocality' => 'Hayes',
            'addressRegion'   => 'Greater London',
            'postalCode'      => 'UB4 0JN',
            'addressCountry'  => 'GB',
        ],
    ];

    if ($page->area_name) {
        $localBusiness['areaServed'] = [
            '@type' => 'City',
            'name'  => $page->area_name,
        ];
    }

    $breadcrumb = [
        '@type' => 'BreadcrumbList',
        'itemListElement' => [],
    ];

    $crumbs = [['Home', $baseUrl]];
    if ($hub) {
        $crumbs[] = [$hub->h1, $baseUrl . '/' . ltrim($hub->url_path, '/')];
    }
    $crumbs[] = [$page->h1, $baseUrl . '/' . ltrim($page->url_path, '/')];

    foreach ($crumbs as $i => $crumb) {
        $breadcrumb['itemListElement'][] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb[0],
            'item'     => $crumb[1],
        ];
    }

    if ($page->type === 'route') {
        $primary = array_filter([
            '@type'       => 'TouristTrip',
            'name'        => $page->h1,
            'description' => $page->answer_block,
            'provider'    => ['@id' => $baseUrl . '/#organisation'],
            'itinerary'   => array_filter([
                '@type'          => 'ItemList',
                'itemListElement' => array_values(array_filter([
                    $page->route_from ? ['@type' => 'Place', 'name' => $page->route_from] : null,
                    $page->route_to   ? ['@type' => 'Place', 'name' => $page->route_to]   : null,
                ])),
            ]),
        ]);
    } else {
        $primary = array_filter([
            '@type'       => 'Service',
            'name'        => $page->h1,
            'description' => $page->answer_block,
            'serviceType' => $page->type === 'wedding' ? 'Wedding car hire' : 'Chauffeur and luxury vehicle hire',
            'provider'    => ['@id' => $baseUrl . '/#organisation'],
            'areaServed'  => $page->area_name ? ['@type' => 'City', 'name' => $page->area_name] : null,
        ]);
    }

    $graph = [$localBusiness, $breadcrumb, $primary];

    if (is_array($page->faqs) && count($page->faqs)) {
        $graph[] = [
            '@type'      => 'FAQPage',
            'mainEntity' => collect($page->faqs)->map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'] ?? '',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => strip_tags($faq['a'] ?? ''),
                ],
            ])->all(),
        ];
    }

    $graph[] = array_filter([
        '@type'         => 'WebPage',
        'name'          => $page->meta_title,
        'url'           => $baseUrl . '/' . ltrim($page->url_path, '/'),
        'description'   => $page->meta_description,
        'datePublished' => optional($page->created_at)->toDateString(),
        'dateModified'  => optional($page->updated_at)->toDateString(),
        'reviewedBy'    => $page->reviewer_name ? array_filter([
            '@type'    => 'Organization',
            'name'     => $page->reviewer_name,
            'jobTitle' => $page->reviewer_title,
        ]) : null,
    ]);

    $jsonLd = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );
@endphp

<script type="application/ld+json">{!! $jsonLd !!}</script>
@endsection

@section('content')

    @include('front.seo.partials.styles')

    {{-- ABOVE THE FOLD: same title band the fleet pages use. One H1 per page. --}}
    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">
                <h1 class="main-title">{{ $page->h1 }}</h1>
                @if($page->intro)
                    <p class="seo-page-standfirst">{{ strip_tags($page->intro) }}</p>
                @endif
            </div>
        </div>
    </div>

    @include('front.seo.partials.enquiry', ['page' => $page])

    <section class="seo-body">
        <div class="seo-wrap">

            {{-- Direct answer block: 40-60 words, immediately after the H1 area. --}}
            <div class="seo-answer" id="answer">
                <p>{!! $page->answer_block !!}</p>
            </div>

            @foreach((array) $page->sections as $i => $section)
                <div class="seo-section">
                    <h2>{{ $section['h2'] ?? '' }}</h2>
                    {!! $section['html'] ?? '' !!}
                </div>

                @if($i === 1)
                    @include('front.seo.partials.vehicles', ['fleet' => $fleet])
                @endif
            @endforeach

            @if(is_array($page->comparison) && !empty($page->comparison['rows']))
                <div class="seo-section">
                    <h2>{{ $page->comparison['caption'] ?? 'At a glance' }}</h2>
                    <div class="seo-table-scroll">
                        <table class="seo-table">
                            <thead>
                                <tr>
                                    @foreach($page->comparison['headers'] ?? [] as $header)
                                        <th scope="col">{{ $header }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($page->comparison['rows'] as $row)
                                    <tr>
                                        @foreach($row as $cell)
                                            <td>{!! $cell !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @if(is_array($page->faqs) && count($page->faqs))
                <div class="seo-section seo-faq">
                    <h2>Frequently asked questions</h2>
                    @foreach($page->faqs as $faq)
                        <details class="seo-faq-item">
                            <summary>{{ $faq['q'] ?? '' }}</summary>
                            <div class="seo-faq-answer">{!! $faq['a'] ?? '' !!}</div>
                        </details>
                    @endforeach
                </div>
            @endif

            {{-- Closing CTA --}}
            <div class="seo-cta">
                <h2>Ready to book?</h2>
                <p>Tell us the date, the pick-up point and the occasion. Our team will confirm the right vehicle and send you a tailored quote.</p>
                <div class="seo-cta-btns">
                    <a class="seo-btn seo-btn-primary" href="#seo_name"
                       onclick="document.getElementById('seo_name').focus();">Get a Free Quote</a>
                    <a class="seo-btn seo-btn-ghost" href="tel:08081680808">Call 0808 168 0808</a>
                    <a class="seo-btn seo-btn-ghost" href="{{ route('fleets') }}">View Our Fleet</a>
                </div>
            </div>

            {{-- Internal linking: rules R2-R7 from the build sheet. --}}
            <div class="seo-links">
                @if($hub)
                    @include('front.seo.partials.links', ['title' => 'Main service', 'items' => collect([$hub])])
                @endif
                @include('front.seo.partials.links', ['title' => 'Nearby areas', 'items' => $nearbyAreas])
                @include('front.seo.partials.links', ['title' => 'Popular transfers', 'items' => $relatedRoutes])
                @include('front.seo.partials.links', ['title' => 'On this route', 'items' => $endpointAreas])
                @if($children->count())
                    @include('front.seo.partials.links', ['title' => 'Where we cover', 'items' => $children])
                @endif
                @include('front.seo.partials.links', ['title' => 'Our other services', 'items' => $siblingHubs])
                @include('front.seo.partials.links', ['title' => 'Useful to know', 'items' => $relatedPages])
            </div>

            <div class="seo-meta">
                @if($page->reviewer_name)
                    <div class="seo-byline">
                        <p>
                            <strong>Reviewed by {{ $page->reviewer_name }}</strong>@if($page->reviewer_title), {{ $page->reviewer_title }}@endif
                            @if($page->reviewed_at)
                                &middot; Last reviewed
                                <time datetime="{{ $page->reviewed_at->toDateString() }}">{{ $page->reviewed_at->format('j F Y') }}</time>
                            @endif
                        </p>
                    </div>
                @endif

                @if(is_array($page->sources) && count($page->sources))
                    <div class="seo-sources">
                        <h2>Sources</h2>
                        <ol>
                            @foreach($page->sources as $source)
                                <li>
                                    <a href="{{ $source['url'] ?? '#' }}" rel="nofollow noopener" target="_blank">{{ $source['label'] ?? $source['url'] ?? '' }}</a>@if(!empty($source['publisher'])) &mdash; {{ $source['publisher'] }}@endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endif
            </div>

        </div>
    </section>

@endsection
