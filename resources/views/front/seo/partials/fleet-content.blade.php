{{-- Enrichment for the existing /fleet/{slug} pages.
     Pulls a seo_pages row of type "fleet" matching the vehicle slug and renders
     a direct-answer block, question-led sections, an FAQ with FAQPage schema
     and a reviewer byline. No new URL is created — this page keeps its own. --}}
@php
    $enrich = null;

    if (class_exists(\App\Models\SeoPage::class) && ! empty($fleet->slug)) {
        $enrich = \App\Models\SeoPage::query()
            ->where('is_published', true)
            ->where('type', 'fleet')
            ->where('slug', $fleet->slug)
            ->first();
    }
@endphp

@if($enrich)
<section class="fleet-enrich">
    <style>
        .fleet-enrich{padding:56px 0}
        .fe-inner{max-width:820px;margin:0 auto;padding:0 20px}
        .fleet-enrich p,.fleet-enrich li{color:#86898E;font-size:17px;line-height:1.85;margin:0 0 22px}
        .fleet-enrich li{margin-bottom:10px}
        .fleet-enrich strong{color:#fff;font-weight:600}
        .fleet-enrich h2{color:#fff;font-size:26px;font-weight:700;margin:0 0 18px;line-height:1.35;
            text-transform:none!important;padding-top:18px;border-top:2px solid rgba(190,155,90,.45);display:inline-block}
        .fleet-enrich a{color:#C9A765}
        .fe-answer{position:relative;background:linear-gradient(180deg,rgba(190,155,90,.10),rgba(190,155,90,.03));
            border:1px solid rgba(190,155,90,.28);border-radius:10px;padding:26px 30px;margin:0 0 48px}
        .fe-answer:before{content:"In short";position:absolute;top:-11px;left:26px;background:#0d0d0d;color:#BE9B5A;
            font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:0 10px}
        .fleet-enrich .fe-answer p{color:#eceef0;font-size:18px;margin:0}
        .fe-sec{margin:0 0 44px}
        .fe-faq details{border:1px solid rgba(255,255,255,.09);border-radius:8px;margin-bottom:12px;background:#131313}
        .fe-faq details[open]{border-color:rgba(190,155,90,.38)}
        .fe-faq summary{color:#fff;font-weight:600;font-size:17px;cursor:pointer;list-style:none;
            display:flex;justify-content:space-between;align-items:center;gap:18px;padding:18px 22px}
        .fe-faq summary::-webkit-details-marker{display:none}
        .fe-faq summary:after{content:"+";color:#BE9B5A;font-size:24px;line-height:1}
        .fe-faq details[open] summary:after{content:"\2212"}
        .fe-faq .fe-a{padding:0 22px 6px}
        .fleet-enrich .fe-a p{font-size:16px}
        .fe-byline{margin:36px 0 0;padding:16px 20px;background:rgba(255,255,255,.03);border-radius:6px}
        .fleet-enrich .fe-byline p{margin:0;font-size:14px;color:#7e838a}
        .fe-byline strong{color:#cfd3d7}
        @media(max-width:767px){.fleet-enrich{padding:36px 0}.fleet-enrich h2{font-size:22px}
            .fleet-enrich p,.fleet-enrich li{font-size:16px}}
    </style>

    <div class="fe-inner">
        @if($enrich->answer_block)
            <div class="fe-answer"><p>{!! $enrich->answer_block !!}</p></div>
        @endif

        @foreach((array) $enrich->sections as $section)
            <div class="fe-sec">
                <h2>{{ $section['h2'] ?? '' }}</h2>
                {!! $section['html'] ?? '' !!}
            </div>
        @endforeach

        @if(is_array($enrich->faqs) && count($enrich->faqs))
            <div class="fe-sec fe-faq">
                <h2>Frequently asked questions</h2>
                @foreach($enrich->faqs as $faq)
                    <details>
                        <summary>{{ $faq['q'] ?? '' }}</summary>
                        <div class="fe-a">{!! $faq['a'] ?? '' !!}</div>
                    </details>
                @endforeach
            </div>

            @php
                $faqLd = json_encode([
                    '@context'   => 'https://schema.org',
                    '@type'      => 'FAQPage',
                    'mainEntity' => collect($enrich->faqs)->map(fn ($f) => [
                        '@type'          => 'Question',
                        'name'           => $f['q'] ?? '',
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($f['a'] ?? '')],
                    ])->all(),
                ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            @endphp
            <script type="application/ld+json">{!! $faqLd !!}</script>
        @endif

        @if($enrich->reviewer_name)
            <div class="fe-byline">
                <p><strong>Reviewed by {{ $enrich->reviewer_name }}</strong>@if($enrich->reviewer_title), {{ $enrich->reviewer_title }}@endif
                @if($enrich->reviewed_at) &middot; Last reviewed <time datetime="{{ $enrich->reviewed_at->toDateString() }}">{{ $enrich->reviewed_at->format('j F Y') }}</time>@endif</p>
            </div>
        @endif
    </div>
</section>
@endif
