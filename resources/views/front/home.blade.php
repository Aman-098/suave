@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-slider-v3">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="assets_front/car-bg.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="themesflat-container">
            <div class="slider-v3 t-al-center">
                <span class="wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2000ms">
                    Hire A <span class="text-golden">Supercar</span>
                </span>

                <h1 class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    Turn Every Drive Into An Experience.
                </h1>

                <p class="wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms">
                    Drive Ferrari, Lamborghini & more across the UK —
                    perfect for weekends, weddings & special occasions.
                </p>

                <div class="group-button wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                    <div class="btn-main">
                        <a href="#" class="button_main_inner">
                            <span>Book Now </span>
                        </a>
                    </div>
                    <div class="btn-main">
                        <a href="#" class="button_main_inner-new">
                            <span>View Fleet</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="brand-slider">
                <div class="brand-card">
                    <img src="assets_front/images/porsche.png">
                    <p>Porsche</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/lamborghini.png">
                    <p>Lamborghini</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/mercedes.png">
                    <p>Mercedes</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/bmw.png">
                    <p>BMW</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/bentley.png">
                    <p>Bentley</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/audi.png">
                    <p>Audi</p>
                </div>

                <div class="brand-card">
                    <img src="assets_front/images/ferrari.png">
                    <p>Ferrari</p>
                </div>
                <div class="brand-card">
                    <img src="assets_front/images/rolls-royce.png">
                    <p>Rolls Royce</p>
                </div>
            </div>
        </div>
    </div>

    <div class="widget-explore-car">
        <div class="themesflat-container">
            <div class="explore-car-wrap">
                <div class="header-section-main mb-46">
                    <h2 class="title-section-main wow fadeInUp">Explore all cars</h2>
                    <div class="btn-read-more wow fadeInUp">
                        <a class="more-link" href="#">
                            <span>More cars</span>
                            <i class="icon-arrow-up-right2"></i>
                        </a>
                    </div>
                </div>
                <div class="explore-car">
                    <a href="#" class="explore-car-item">
                        <img src="assets_front/img/car2.jpg" alt="">
                        <h5 class="title-explore">Sports Cars</h5>
                    </a>
                    <a href="#" class="explore-car-item">
                        <img src="assets_front/img/car1.jpg" alt="">
                        <h5 class="title-explore">Luxury Cars</h5>
                    </a>
                    <a href="#" class="explore-car-item">
                        <img src="assets_front/img/car3.jpg" alt="">
                        <h5 class="title-explore">Wedding Hire</h5>
                    </a>
                    <a href="#" class="explore-car-item">
                        <img src="assets_front/img/car4.jpg" alt="">
                        <h5 class="title-explore">Weekend Hire</h5>
                    </a>
                    <!-- <a href="#" class="explore-car-item">
                                                                                        <img src="assets_front/img/car5.jpg">
                                                                                        <h5 class="title-explore">Luxury</h5>
                                                                                    </a> -->
                </div>
                <div class="cen-btn"><a href="#" class="review-btn">From £599/day | Free Delivery
                        Available</a>
                </div>
            </div>
        </div>
    </div>

    <section class="review-section">
        <div class="review-box-main">
            <h2 class="review-heading">
                Trusted By 500+ Happy Clients Across The UK
            </h2>
            <div class="review-cards">
                <div class="review-card">
                    <div class="stars">★★★★★</div>
                    <h3 class="rating">4.9</h3>
                    <div class="brand-logo">
                        <img src="assets_front/img/logo/google.png" alt="">
                    </div>
                    <span class="count">237 Reviews</span>
                </div>
                <div class="review-card">
                    <div class="stars">★★★★★</div>
                    <h3 class="rating">4.8</h3>
                    <div class="brand-logo">
                        <img src="assets_front/img/logo/trustpilot.png" alt="">
                    </div>
                    <span class="count">128 Reviews</span>
                </div>
                <div class="review-card">
                    <div class="stars">★★★★★</div>
                    <h3 class="rating">4.7</h3>
                    <div class="brand-logo">
                        <img src="assets_front/img/logo/tripadvisor.png" alt="">
                    </div>
                    <span class="count">94 Reviews</span>
                </div>
            </div>
            <a href="#" class="review-btn">Read Customer Reviews →</a>
        </div>
    </section>

    <section class="about-luxury">
        <div class="container">
            <div class="about-grid">
                <div class="about-right">
                    <div class="service-box-panel">
                        <img src="assets_front/img/porsche-911.jpg">
                    </div>
                </div>
                <div class="about-left">
                    <span class="about-tag">About Us</span>
                    <h2>Drive The Dream.
                        Experience our Most Iconic Supercars</h2>
                    <p>
                        Established since 2020, Suave Executive has always Thrived to Provide the Ultimate
                        Customer Satisfaction when it comes to Vehicle Rental. We specialise in high end Car
                        Hire/Rental. The type of cars we have available are only the top end of cars from
                        Lamborghini Huracan’s to the Bugatti Chiron. However we also cater to clients who want
                        long term Hire Vehicles or PCO licensed vehicles such as Mercedes E class to Toyota
                        Prius.
                    </p>
                    <a class="btn-icon-list" href="#">
                        <span>Explore Our Cars</span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="widget-populer-makes-h5">
        <div class="themesflat-container">
            <div class="populer-makes">
                <div class="heading-section t-al-center mb-28">
                    <h2 class="title wow fadeInUp">Where Great Cars Meet Great Prices</h2>
                </div>
                <ul class="nav nav-pills tab-car-service-v2 justify-content-center mb-30" id="pills-tab-service-v2"
                    role="tablist">
                    @php $i = 0; @endphp
                    @foreach ($fleets as $categoryName => $products)
                        {{-- @php $slug = Str::slug($categoryName); @endphp --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $i == 0 ? 'active' : '' }}" id="pills-cadilliac-tab-service-v2"
                                data-bs-toggle="pill" data-bs-target="#tab-{{ $categoryName }}" type="button"
                                role="tab" aria-selected="true"> {{ $categoryName }}</button>
                        </li>
                        @php $i++; @endphp
                    @endforeach

                </ul>


                <div id="videoPopup" class="video-popup">
                    <div class="video-content">
                        <span class="close-btn-video" onclick="closeVideo()">✖</span>

                        <iframe id="videoFrame" src="" frameborder="0" allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>


                <div id="videoPopup" class="video-popup">
                    <button class="close-btn" onclick="closeVideo()">
                        <svg viewBox="0 0 24 24">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <div class="video-content">
                        <iframe id="videoFrame" src="" allowfullscreen>
                        </iframe>
                    </div>

                </div>

                <div class="tab-content" id="pills-tabContent-v2">
                    @php $i = 0; @endphp

                    @foreach ($fleets as $categoryName => $products)
                        {{-- @php $slug = Str::slug($categoryName); @endphp --}}
                        <div class="tab-pane {{ $i == 0 ? 'show active' : '' }}"
                            id="tab-{{ $categoryName }}" role="tabpanel">
                            <div class="car-list-item">
                                @foreach ($products as $item)
                                    <div class="tf-car-service">
                                        <a href="{{ url('fleet/' . $item->slug) }}" class="image">
                                            <div class="stm-badge-top">
                                                <div class="feature">
                                                    <span>{{ $item->badge }}</span>
                                                </div>
                                                @if (!empty($item->video))
                                                    <div class="play-btn" onclick="openVideo('{{ $item->video }}')">
                                                        <svg viewBox="0 0 24 24">
                                                            <polygon points="8,5 19,12 8,19"></polygon>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="listing-images">
                                                <div class="hover-listing-image">
                                                    <div class="wrap-hover-listing">
                                                        <div class="listing-item active" title="">
                                                            <div class="images">
                                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                                    class="swiper-image tfcl-light-gallery"
                                                                    alt="images">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="content">
                                            <h6 class="title">{{ $item->name }}</h6>
                                            <div class="description">
                                                <ul>
                                                    <li class="listing-information fuel">
                                                        <div class="inner">
                                                            <span>{{ number_format($item->price, 2) }} ₤/DAY</span>
                                                        </div>
                                                    </li>
                                                    {{-- <li class="listing-information size-engine">
                                                        <div class="inner">
                                                            <span>1,500 ₤/HOUR</span>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="bottom-btn-wrap">
                                                <div class="btn-read-more">
                                                    <a class="more-link" href="{{ url('fleet/' . $item->slug) }}">
                                                        <span>View details</span>
                                                        <i class="icon-arrow-right2"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <a href="#" class="icon-service">
                                                        <svg width="18" height="18" viewBox="0 0 24 24"
                                                            fill="#fff">
                                                            <path
                                                                d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                        </svg>
                                                    </a>
                                                    <a href="https://wa.me/919988998899" target="_blank"
                                                        class="icon-service">
                                                        <i class="icon-whatsapp-1"></i>
                                                    </a>
                                                    <a href="#" class="icon-service">
                                                        Book Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <section class="rent-section">
        <div class="rent-container">
            <div class="rent-image">
                <img src="assets_front/img/car99.jpg" alt="">
            </div>
            <div class="rent-content">
                <h2>Rent your car in 3 easy steps</h2>
                <div class="step">
                    <span>01</span>
                    <div>
                        <h4>Choose your car</h4>
                        <p>Browse our wide selection of vehicles and pick the perfect ride.</p>
                    </div>
                </div>

                <div class="step">
                    <span>02</span>
                    <div>
                        <h4>Book online</h4>
                        <p>Reserve your car in just a few clicks with our booking system.</p>
                    </div>
                </div>

                <div class="step">
                    <span>03</span>
                    <div>
                        <h4>Pick up & drive</h4>
                        <p>Collect your keys and enjoy a smooth ride with our vehicles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="benefits-section">
        <div class="container">
            <span class="tag">BENEFITS</span>
            <h2>Why Choose Us?</h2>
            <p class="subtitle">
                Innovative tools and powerful insights designed to elevate your business
            </p>
            <div class="benefits-grid">
                <div class="card">
                    <div class="icon">$</div>
                    <h3>Instant Savings</h3>
                    <p>Get immediate savings on every purchase, powered by AI.</p>
                </div>
                <div class="card">
                    <div class="icon">📈</div>
                    <h3>Real-Time Insights</h3>
                    <p>Make smarter decisions with live data and insights.</p>
                </div>
                <div class="card">
                    <div class="icon">⇄</div>
                    <h3>Flexible Plans</h3>
                    <p>Choose plans that adapt to your business needs.</p>
                </div>
                <div class="card">
                    <div class="icon">🔒</div>
                    <h3>Secure Transactions</h3>
                    <p>Advanced encryption ensures safe transactions.</p>
                </div>
                <div class="card">
                    <div class="icon">⚙</div>
                    <h3>Adaptive Features</h3>
                    <p>AI powered tools that evolve with your business.</p>
                </div>
                <div class="card">
                    <div class="icon">🎧</div>
                    <h3>Dedicated Support</h3>
                    <p>24/7 expert assistance whenever you need help.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container google-review">
        <h2>Feedback From Satisfied Clients</h2>

        <div class="feedback-slider">

            <!-- Arrows -->
            <button class="arrow prev">&#10094;</button>
            <button class="arrow next">&#10095;</button>

            <div class="feedback-track">

                <!-- Card 1 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>I needed a reliable car for my business trip and this service exceeded my expectations.
                    </p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=1">
                        <span>Mark Stevens</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>As a frequent traveler for work, I rely on rentals often. This company is my go-to.</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=2">
                        <span>Lisa Anderson</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>The car was fuel-efficient and environmentally friendly. Loved the experience.</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=3">
                        <span>Brian T</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>Last minute booking was easy and the pickup process was seamless.</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=4">
                        <span>Emma Johnson</span>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>There was plenty of room and customer service was excellent.</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=5">
                        <span>Jessica Ramirez</span>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>The car was delivered quickly and handled professionally.</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=6">
                        <span>Chris P</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="widget-feature-car">
        <div class="themesflat-container full">
            <div class="feature-car">
                <div class="feature-car-content">
                    <div class="heading-section">
                        <span class="sub-title mb-6 wow fadeInUp">Trusted Car Delaer Service</span>
                        <h2 class="title mb-40 wow fadeInUp">Frequently Questions & Asking Zone..</h2>

                    </div>
                    <div class="list-icon-check">
                        <div class="accordion faq-accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq1">
                                        What do I need to rent a car?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        You need a valid driving license, passport or Emirates ID and a valid
                                        payment
                                        method.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2">
                                        Can someone else drive the rental car?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, additional drivers can be added by providing valid documents.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq3">
                                        Is insurance included with the car?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Basic insurance is included with every rental vehicle.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq4">
                                        How much does it cost to rent a luxury car?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        The price depends on the vehicle model, rental duration and season.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="feature-car-video video-wrap">
                    <img src="assets_front/img/faq.jpg" alt="">
                    <a href="https://www.youtube.com/watch?v=kK4wA93QKoQ" class="popup-youtube icon-video">
                        <i class="icon-Polygon-6"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="widget-blog-v2 main-content">
        <div class="themesflat-container">
            <div class="blog-v2">
                <div class="heading-section t-al-center mb-46">
                    <span class="sub-title mb-6 wow fadeInUp">Our Blogs</span>
                    <h2 class="title wow fadeInUp">Latest news & article</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-md-4">
                            <article class="widget-blog bl-v2">
                                <div class="feature-post">
                                    {{-- <div class="category">
                                        <ul class="flex">
                                            <li>
                                                <a href="#"><i class="icon-Group-12"></i>Business</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <a href="{{ url('blog/' . $item->slug) }}">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="image">
                                    </a>
                                </div>
                                <div class="main-post">
                                    <div class="entry-meta flex">
                                        <span class="author">
                                            <i class="icon-Group-13"></i>
                                            <a href="#">{{ ucfirst($item->author) }}</a>
                                        </span>
                                    </div>
                                    <div class="line"></div>
                                    <h2 class="entry-title">
                                        <a href="#">{{ ucfirst($item->title) }}</a>
                                    </h2>
                                    <div class="btn-read-more">
                                        <a class="more-link" href="{{ url('blog/' . $item->slug) }}">
                                            <span>Read More</span>
                                            <i class="icon-Group-21"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach

                    {{-- <div class="col-md-4">
                        <article class="widget-blog bl-v2">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#"><i class="icon-Group-12"></i>Business</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <img src="assets_front/img/car2.jpg" alt="image">
                                </a>
                            </div>
                            <div class="main-post">
                                <div class="entry-meta flex">
                                    <span class="author">
                                        <i class="icon-Group-13"></i>
                                        <a href="#">Mehedii</a>
                                    </span>
                                </div>
                                <div class="line"></div>
                                <h2 class="entry-title">
                                    <a href="#">How the Maruti Invicto is a
                                        lesson in brand buil...</a>
                                </h2>
                                <div class="btn-read-more">
                                    <a class="more-link" href="#">
                                        <span>Read More</span>
                                        <i class="icon-Group-21"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="widget-blog bl-v2">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#"><i class="icon-Group-12"></i>Business</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <img src="assets_front/img/car5.jpg" alt="image">
                                </a>
                            </div>
                            <div class="main-post">
                                <div class="entry-meta flex">
                                    <span class="author">
                                        <i class="icon-Group-13"></i>
                                        <a href="#">Mehedii</a>
                                    </span>
                                </div>
                                <div class="line"></div>
                                <h2 class="entry-title">
                                    <a href="#">How the Maruti Invicto is a
                                        lesson in brand buil...</a>
                                </h2>
                                <div class="btn-read-more">
                                    <a class="more-link" href="#">
                                        <span>Read More</span>
                                        <i class="icon-Group-21"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
