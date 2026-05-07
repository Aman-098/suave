<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
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
    <div class="preload preload-container">
        <div class="middle">
        </div>
    </div>
    <div id="wrapper">
        <div id="page" class="clearfix">
            @include('front.partials.header')

            @yield('content')

            @include('front.partials.footer')
