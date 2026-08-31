<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5948FNMC');</script>
<!-- End Google Tag Manager -->
<script> gtag('config', 'AW-16576848800/VkLrCO-BuNgcEKDHuuA9', { 'phone_conversion_number': '0808 168 0808' }); </script>
    <meta charset="utf-8">

    <title>@yield('title', 'SUAVE | Luxury Car Rental')</title>
    <meta name="description" content="@yield('meta_description', 'SUAVE Executive Travel offers luxury and supercar hire across London, including sports cars, SUVs, executive limousines and wedding car hire.')">
    <meta name="keywords" content="@yield('meta_keywords', 'luxury car hire London, supercar rental, executive car hire, wedding car hire')">
    <link rel="canonical" href="{{ url()->current() }}">

    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "AutoRental",
        "name": "SUAVE Executive Travel",
        "image": "{{ asset('assets_front/images/logo/logo.png') }}",
        "url": "{{ url('/') }}",
        "telephone": "0808 168 0808",
        "priceRange": "££££",
        "address": {
        "@type": "PostalAddress",
        "addressLocality": "London",
        "addressCountry": "GB"
        },
        "sameAs": []
        }
    </script>
    @yield('schema')

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SUAVE Executive Travel">
    <meta property="og:title" content="@yield('title', 'SUAVE | Luxury Car Rental')">
    <meta property="og:description" content="@yield('meta_description', 'SUAVE Executive Travel offers luxury and supercar hire across London, including sports cars, SUVs, executive limousines and wedding car hire.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets_front/images/logo/logo.png'))">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'SUAVE | Luxury Car Rental')">
    <meta name="twitter:description" content="@yield('meta_description', 'SUAVE Executive Travel offers luxury and supercar hire across London, including sports cars, SUVs, executive limousines and wedding car hire.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets_front/images/logo/logo.png'))">
    <meta name="author" content="suaveexecutivetravel">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('assets_front/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets_front/images/logo/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets_front/images/logo/logo.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets_front/css/map.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets_front/css/nice-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets_front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets_front/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <style>
    .suave-consult-card {
        display: none;
    }

    .suave-consult-wrap {
        max-width: 720px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
    }

    .suave-consult-card {
        /* background: linear-gradient(180deg, #1b2251 0%, #141a40 100%); */
        border-radius: 20px;
        padding: 40px 36px;
        box-shadow: 0 20px 45px rgba(10, 14, 40, 0.35);
    }

    .suave-consult-title {
        color: #ffffff;
        text-align: center;
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 32px;
        letter-spacing: 0.3px;
    }

    .suave-consult-row {
        display: flex;
        gap: 20px;
        margin-bottom: 22px;
    }

    .suave-consult-field {
        flex: 1 1 0;
        min-width: 0;
        display: flex;
        flex-direction: column;
    }

    .suave-consult-field.full {
        flex: 1 1 100%;
    }

    .suave-consult-field label {
        color: #ffffff;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
        white-space: nowrap;
    }

    .suave-consult-field input,
    .suave-consult-field textarea {
        border: none;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 13px;
        font-family: inherit;
        background: #ffffff;
        color: #1b2251;
        outline: none;
        width: 100%;
        box-sizing: border-box;
    }

    .suave-consult-field input::placeholder,
    .suave-consult-field textarea::placeholder {
        color: #8a8fa3;
    }

    .suave-consult-field input:focus,
    .suave-consult-field textarea:focus {
        box-shadow: 0 0 0 3px rgba(200, 164, 93, 0.55);
    }

    .suave-consult-field textarea {
        height: 40px;
        resize: vertical;
        overflow-y: hidden;
    }

    .suave-consult-btn-row {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .suave-consult-btn {
        background: #be9b5a;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 16px 42px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        letter-spacing: 0.3px;
    }

    .suave-consult-btn:hover {
        background: #b6924e;
    }

    @media(max-width:1060px) {
        .suave-consult-card {
            display: block;
            border: 1px solid;
        }
    }

    /* Mobile — fields stay in a row, just tighter spacing/sizing */
    @media (max-width: 640px) {
        .suave-consult-card {
            display: block;
            margin-top: -50px;
            z-index: 2;
            padding: 10px 16px;
            border-radius: 16px;
            position: relative;
            background-color: black;
            border: 1px solid;
        }

        .suave-consult-title {
            font-size: 20px;
            margin-bottom: 22px;
        }

        .suave-consult-row {
            gap: 8px;
            margin-bottom: 16px;
        }

        .suave-consult-field label {
            font-size: 13px;
            white-space: normal;
        }

        .suave-consult-field input,
        .suave-consult-field textarea {
            height: 40px;
            /* line-height: 40px; */
            padding: 0 8px;
            font-size: 13px;
            border-radius: 8px;
        }

        .suave-consult-btn {
            width: 100%;
            padding: 14px 0;
            font-size: 14px;
        }
    }
</style>
</head>

<body class="body counter-scroll">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5948FNMC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="preload preload-container">
        <div class="middle">
        </div>
    </div>
    <div id="wrapper">
        <div id="page" class="clearfix">
            @include('front.partials.header')

            @yield('content')

            @include('front.partials.footer')
