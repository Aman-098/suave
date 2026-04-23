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
            <div class="fleet-section">
                <div class="fleet-header">
                    <h2>Sport</h2>
                    <div class="fleet-arrows">
                        <div class="swiper-button-prev sport-prev"></div>
                        <div class="swiper-button-next sport-next"></div>
                    </div>
                </div>

                <div class="swiper sport-slider">
                    <div class="swiper-wrapper">

                        <!-- EACH ITEM -->
                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="fleet-section">
                <div class="fleet-header">
                    <h2>Luxury </h2>
                    <div class="fleet-arrows">
                        <div class="swiper-button-prev luxury-prev"></div>
                        <div class="swiper-button-next luxury-next"></div>
                    </div>
                </div>

                <div class="swiper luxury-slider">
                    <div class="swiper-wrapper">

                        <!-- EACH ITEM -->
                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="tf-car-service">
                                <a href="#" class="image">
                                    <div class="stm-badge-top">
                                        <div class="feature">
                                            <span>Limited Availability</span>
                                        </div>
                                        <div class="play-btn" onclick="openVideo()">
                                            <svg viewBox="0 0 24 24">
                                                <polygon points="8,5 19,12 8,19"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <img src="assets_front/img/car1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="title">Luxury Rolls Royce Cullinan 6</h6>
                                    <div class="description">
                                        <span>4,320 ₤/DAY</span>
                                        <span>1,500 ₤/HOUR</span>
                                    </div>
                                    <div class="bottom-btn-wrap-fleet">
                                        <div class="btn-read-more">
                                            <a class="more-link" href="#">
                                                <span>View details</span>
                                                <i class="icon-arrow-right2"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-panel">
                                            <a href="#" class="icon-service">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                                    <path
                                                        d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                </svg>
                                            </a>
                                            <a href="https://wa.me/919988998899" target="_blank" class="icon-service">
                                                <i class="icon-whatsapp-1"></i>
                                            </a>
                                            <a href="#" class="icon-service">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


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
