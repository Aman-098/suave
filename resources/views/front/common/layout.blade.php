<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'Ravair Solar')</title>

     <!-- Meta Description (VERY IMPORTANT) -->

    <meta name="description" content="@yield('meta_description', 'Ravair solar')">

    <!-- Meta Keywords (optional but ok) -->
    <meta name="keywords" content="@yield('meta_keywords', 'solar')">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets_front/icon/flaticon_glamer.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/vendor/splide/splide.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/vendor/swiper/swiper-bundle.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />

    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets_front/vendor/slim-select/slimselect.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/vendor/animate-wow/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/vendor/no-ui-slider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    
				
</head>

<body>

    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')
