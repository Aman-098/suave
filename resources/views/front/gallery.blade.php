@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Our Gallery</h1>

                <!-- <ul class="breadcrum">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">About us</a></li>
                            </ul> -->
            </div>
        </div>
    </div>

    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Our Gallery</h2>

            <div class="gallery-grid">

                <div class="gallery-item">
                    <img src="assets/img/blog-1.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/blog-2.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/blog-3.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/blog-4.webp" alt="">
                </div>
                <div class="gallery-item">
                    <img src="assets/img/car1.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car1.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car2.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car2.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car3.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car3.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car4.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets/img/car4.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- LIGHTBOX -->
    <div class="lightbox" id="lightbox">
        <span class="close">&times;</span>
        <img class="lightbox-img" id="lightbox-img">

        <div class="nav prev">&#10094;</div>
        <div class="nav next">&#10095;</div>
    </div>

@endsection
