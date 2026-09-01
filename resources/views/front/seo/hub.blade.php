@extends('front.common.layout')

@section('title', $config['title'])
@section('meta_description', $config['desc'])
@section('og_image', asset('assets_front/images/logo/logo.png'))

@section('schema')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
@php
    $baseUrl = rtrim(config('app.url') ?: url('/'), '/');
    $hubUrl  = $baseUrl . '/' . $hub;

    $graph = [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $baseUrl],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $config['h1'], 'item' => $hubUrl],
            ],
        ],
        [
            '@type'       => 'CollectionPage',
            'name'        => $config['h1'],
            'description' => $config['desc'],
            'url'         => $hubUrl,
            'mainEntity'  => [
                '@type' => 'ItemList',
                'numberOfItems' => $pages->count(),
                'itemListElement' => $pages->values()->map(function ($p, $i) use ($baseUrl) {
                    return [
                        '@type'    => 'ListItem',
                        'position' => $i + 1,
                        'name'     => $p->h1,
                        'url'      => $baseUrl . '/' . ltrim($p->url_path, '/'),
                    ];
                })->all(),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')

    @include('front.seo.partials.styles')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">
                <h1 class="main-title">{{ $config['h1'] }}</h1>
                <p class="seo-page-standfirst">{{ $config['intro'] }}</p>
            </div>
        </div>
    </div>

    <section class="seo-body">
        <div class="seo-wrap">
            <div class="seo-section">
                <ul class="seo-linkblock-list">
                    @foreach($pages as $p)
                        <li>
                            <a href="{{ url('/' . ltrim($p->url_path, '/')) }}">{{ $p->h1 }}</a>
                            @if($p->meta_description)
                                <span> &mdash; {{ \Illuminate\Support\Str::limit(strip_tags($p->meta_description), 120) }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="seo-cta">
                <p>Not sure which one you need? Call
                    <a href="tel:08081680808">0808 168 0808</a>
                    and we will quote your journey directly.</p>
            </div>
        </div>
    </section>

@endsection
