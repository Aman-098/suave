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

    if (! empty($config['faqs'])) {
        $graph[] = [
            '@type' => 'FAQPage',
            'mainEntity' => collect($config['faqs'])->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name'  => $faq['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
                ];
            })->all(),
        ];
    }
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

            @if(! empty($config['answer']))
                <div class="seo-answer" id="answer">
                    <p>{{ $config['answer'] }}</p>
                </div>
            @endif

            @foreach(($config['sections'] ?? []) as $i => $section)
                <div class="seo-section">
                    <h2>{{ $section['h2'] }}</h2>
                    {!! $section['html'] !!}
                </div>

                @if($i === 0)
                    <div class="seo-section">
                        <h2>{{ $config['listTitle'] ?? 'In this section' }}</h2>
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
                @endif

                @if($i === 1 && ! empty($config['comparison']['rows']))
                    <div class="seo-section">
                        <h2>{{ $config['comparison']['caption'] ?? 'At a glance' }}</h2>
                        <div class="seo-table-scroll">
                            <table class="seo-table">
                                <thead>
                                    <tr>
                                        @foreach($config['comparison']['headers'] as $header)
                                            <th>{{ $header }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($config['comparison']['rows'] as $row)
                                        <tr>
                                            @foreach($row as $cell)
                                                <td>{{ $cell }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach

            @if(! empty($config['faqs']))
                <div class="seo-section seo-faq">
                    <h2>Frequently asked questions</h2>
                    @foreach($config['faqs'] as $faq)
                        <details class="seo-faq-item">
                            <summary>{{ $faq['q'] }}</summary>
                            <div class="seo-faq-answer"><p>{{ $faq['a'] }}</p></div>
                        </details>
                    @endforeach
                </div>
            @endif

            <div class="seo-cta">
                <h2>Ready to book?</h2>
                <p>Call <a href="tel:08081680808">0808 168 0808</a> and we will quote your journey directly, or use the enquiry form.</p>
            </div>

            <div class="seo-byline">
                <p>
                    <strong>Reviewed by Suave Executive Travel Team</strong>, Luxury Travel &amp; Vehicle Hire Specialists
                    &middot; Last reviewed {{ \Illuminate\Support\Carbon::parse('2026-09-01')->format('j F Y') }}
                </p>
            </div>

            @if(! empty($config['sources']))
                <div class="seo-sources">
                    <h2>Sources</h2>
                    <ul>
                        @foreach($config['sources'] as $source)
                            <li>
                                <a href="{{ $source['url'] }}" rel="nofollow noopener" target="_blank">{{ $source['label'] }}</a>
                                @if(! empty($source['publisher'])) &mdash; {{ $source['publisher'] }} @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>

@endsection
