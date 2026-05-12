@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Our Fleet</h1>

                <!-- <ul class="breadcrum">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About us</a></li>
                </ul> -->
            </div>
        </div>
    </div>

    <section class="car-listing-page dark-theme-listing">
        <div class="themesflat-container">

            @foreach ($fleets as $categoryName => $products)
                <div class="fleet-section">
                    <div class="fleet-header">
                        <h2>{{ $categoryName }}</h2>
                        <div class="fleet-arrows">
                            <div class="swiper-button-prev {{ $categoryName }}-prev"></div>
                            <div class="swiper-button-next {{ $categoryName }}-next"></div>
                        </div>
                    </div>

                    <div class="swiper sport-slider">
                        <div class="swiper-wrapper">

                            <!-- EACH ITEM -->
                            @foreach ($products as $item)
                                <div class="swiper-slide">
                                    <div class="tf-car-service">
                                        <a href="{{ url('fleet/' . $item->slug) }}" class="image">
                                            <div class="stm-badge-top">
                                                @if(!empty($item->badge))
                                                    <div class="feature">
                                                        <span>{{ $item->badge }}</span>
                                                    </div>
                                                @endif
                                                @if(!empty($item->video))
                                                    <div class="play-btn" onclick="openVideo()">
                                                        <svg viewBox="0 0 24 24">
                                                            <polygon points="8,5 19,12 8,19"></polygon>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                                        </a>
                                        <div class="content">
                                            <h6 class="title">{{ $item->name }}</h6>
                                            <div class="description">
                                                {{-- <span>4,320 ₤/DAY</span> --}}
                                                <span>₤ {{ number_format($item->price,2) }} /Day</span>
                                            </div>
                                            <div class="bottom-btn-wrap-fleet">
                                                <div class="btn-read-more">
                                                    <a class="more-link" href="{{ url('fleet/' . $item->slug) }}">
                                                        <span>View details</span>
                                                        <i class="icon-arrow-right2"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group-panel">
                                                    <a href="tel:919988998899" class="icon-service">
                                                        <i class="fa fa-phone" style="color: white;"></i>
                                                    </a>
                                                    <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                        <i class="icon-whatsapp-1"></i>
                                                    </a>
                                                    <a href="{{ url('fleet/' . $item->slug) }}" class="icon-service">
                                                        Book Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

        

                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper('.sport-slider', {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,

                navigation: {
                    nextEl: '.sport-next',
                    prevEl: '.sport-prev',
                },

                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                }
            });

            new Swiper('.luxury-slider', {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,

                navigation: {
                    nextEl: '.luxury-next',
                    prevEl: '.luxury-prev',
                },

                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                }
            });

        });
    </script>
@endpush
