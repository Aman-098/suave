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
    <meta charset="utf-8">

    <title>SUAVE | Luxury Car Rental</title>

    <meta name="author" content="themesflat.com">
    <meta name="robots" content="noindex, nofollow">
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
