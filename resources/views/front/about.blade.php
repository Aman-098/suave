@extends('front.common.layout')

@section('title', 'About Us | SUAVE Executive Travel')

@section('meta_description', 'Learn about SUAVE Executive Travel, London luxury and supercar rental specialists, established 2022, offering premium vehicle hire and PCO vehicles.')

@section('meta_keywords', 'about SUAVE Executive Travel, luxury car rental company London')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">About Company</h1>
            </div>
        </div>
    </div>

    <div class="royal-ui">
        <section class="about-luxury">
            <div class="container">
                <div class="about-grid">
                    <div class="about-right">
                        <div class="service-box-panel">
                            <img src="{{ asset('assets_front/img/ferrari-about.jpeg') }}">
                        </div>
                    </div>
                    <div class="about-left">
                        <h2>About Us</h2>

                        <p>At Suave Executive Travel, we believe every journey should reflect the same level of quality and
                            professionalism as the destination itself. Built on a passion for exceptional vehicles and
                            outstanding customer service, we offer a carefully selected fleet of prestige, executive and
                            performance cars for individuals, families and businesses seeking a first-class travel
                            experience.</p>

                        <p>Whether you're planning a wedding, attending an important business meeting, celebrating a special
                            occasion or simply enjoying the thrill of driving a luxury vehicle, our team is committed to
                            delivering an experience that exceeds expectations. Every booking is managed with attention to
                            detail, ensuring a smooth, reliable and personalised service from enquiry to completion.</p>

                        {{-- <p>Today, clients across London, Berkshire, Buckinghamshire, Surrey and the wider UK trust Suave Executive Travel for premium vehicle hire, executive travel and unforgettable luxury experiences.</p> --}}
                    </div>
                </div>
            </div>
        </section>


        <!-- JOURNEY -->
        <section class="section dark journey-section">
            <div class="container">
                <h2>Our Journey</h2>
                <p>Suave Executive Travel was created with one clear vision—to make luxury travel more accessible without
                    compromising on quality, professionalism or customer experience.</p>

                <p>What began with a passion for prestige vehicles has grown into a trusted luxury travel brand, offering an
                    exclusive fleet and a customer-first approach. Every milestone has been built on reliability,
                    transparency and consistently delivering exceptional experiences for every client.</p>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="section-whatoffer">
            <div class="container">
                <h2>What We Offer</h2>
                <ul class="list">
                    <li>Prestige Car Hire</li>
                    <li>Executive Travel</li>
                    <li>Wedding Car Hire</li>
                    <li>Corporate Travel</li>
                    <li>Airport Transfers</li>
                    <li>Self-Drive Supercars</li>
                    <li>VIP & Special Event Transport</li>
                </ul>
                <p class="extra">
                    Every service is delivered with the same commitment to quality, professionalism and attention to detail.
                </p>
            </div>
        </section>

        <!-- COVERAGE -->
        <section class="section dark coverage-section">
            <div class="container">
                <h2>Nationwide Luxury Coverage</h2>

                <p>Our services extend throughout London and across the UK, helping individuals, families and businesses
                    enjoy premium travel wherever their journey begins.</p>
                <p>
                    From executive travel in Central London to airport transfers, wedding vehicle hire and luxury driving
                    experiences across Berkshire, Surrey, Buckinghamshire, Reading, Windsor, Oxford and beyond, we provide
                    dependable service backed by premium vehicles and personalised support.
                </p>
            </div>
        </section>

        <!-- WHY US -->
        <section class="section-whychoose">
            <div class="container">
                <h2>Why Choose Suave Executive Travel</h2>
                <ul class="check">
                    <li>Carefully maintained fleet of prestige and luxury vehicles</li>
                    <li>Transparent pricing with no hidden costs</li>
                    <li>Flexible hire options tailored to your requirements</li>
                    <li>Reliable service delivered with professionalism</li>
                    <li>Simple online booking process</li>
                    <li>Personal support before, during and after every booking</li>
                </ul>
                <p>We focus on delivering more than transport—we create memorable luxury experiences.</p>
            </div>
        </section>

        <!-- COMMITMENT -->
        <section class="section dark commitment-section">
            <div class="container">
                <h2>Our Commitment to Excellence</h2>
                <p>Every vehicle within our fleet is professionally inspected, meticulously prepared and presented to the
                    highest possible standard before every booking</p>
                <p>Our commitment extends beyond the vehicle itself. We continually invest in customer service, vehicle
                    quality and operational excellence to ensure every journey reflects the premium standards our clients
                    expect.</p>
            </div>
        </section>

        <!-- CTA -->
        <section class="section-travel-pro center ">
            <div class="container">
                <h2>Travel with Confidence</h2>
                <p>Whether you're hiring a prestige vehicle for business, leisure or a once-in-a-lifetime occasion, you can expect outstanding quality, exceptional service and complete peace of mind.
                </p>
                <p><strong>At Suave Executive Travel, every journey is designed to deliver comfort, confidence and an unforgettable luxury experience.</strong></p>
            </div>
        </section>

        <!-- FOUNDER -->
        {{-- <section class="section-founder dark">
            <div class="container">
                <h2>Founder / Leadership</h2>

                <ul class="list">
                    <li>Experience</li>
                    <li>Vision</li>
                    <li>Industry Background</li>
                </ul>
            </div>
        </section> --}}

        <!-- TIMELINE -->
        <section class="section-timeline">
            <div class="container">
                <h2>Years of Experience</h2>
                <div class="timeline">
                    <div class="timeline-item"><span>2022</span> Company Founded <br>
                    </div>
                    <div class="timeline-item"><span>2023</span> Brand Expansion</div>
                    <div class="timeline-item"><span>2024</span> Fleet Growth</div>
                    <div class="timeline-item"><span>Today</span> Premium Luxury Experiences</div>

                </div>
            </div>
        </section>

        <!-- WE SERVE -->
        <section class="section-we-serve dark">
            <div class="container">
                <h2>We Serve</h2>
                <ul class="list">
                    <li>Corporate executives</li>
                    <li>Wedding clients</li>
                    <li>VIP guests</li>
                    <li>Event planners</li>
                    <li>Tourists visiting the UK</li>
                    <li>Business travellers</li>
                </ul>
            </div>
        </section>

        <!-- QUALITY -->
        <section class="section-fleet">
            <div class="container">
                <h2>Fleet Quality Assurance</h2>
                <p>Maintained to the Highest Standards</p>

                <ul class="list">
                    <li>Regular servicing</li>
                    <li>Insured vehicles</li>
                    <li>Clean interiors</li>
                    <li>Latest models</li>
                </ul>

            </div>
        </section>

        <!-- CHAUFFEUR -->
        <section class="section-professional dark">
            <div class="container">
                <h2>Professional Chauffeurs You Can Trust</h2>

                <ul class="list">
                    <li>Licensed drivers</li>
                    <li>Background verified</li>
                    <li>Trained in etiquette</li>
                    <li>Punctual</li>
                    <li>Discreet</li>
                </ul>

            </div>
        </section>

        <!-- COVERAGE MAP -->
        <section class="section-serving">
            <div class="container">
                <h2>Serving Clients Across the United Kingdom</h2>
                <p>London · Manchester · Birmingham · Leeds · Nationwide travel</p>

                <a href="{{ route('fleets') }}" class="review-btn">Explore Our Cars →</a>
            </div>
        </section>

        <!-- SAFETY -->
        <section class="section-safety dark">
            <div class="container">
                <h2>Safety First Approach</h2>
                <ul class="list">
                    <li>Fully insured vehicles</li>
                    <li>Licensed chauffeurs</li>
                    <li>Client protection</li>
                </ul>
            </div>
        </section>

        <!-- BOOKING -->
        <section class="section-simple">
            <div class="container">
                <h2>Simple & Seamless Booking Experience</h2>

                <ul class="list">
                    <li>Enquiry</li>
                    <li>Confirmation</li>
                    <li>Vehicle assignment</li>
                    <li>Journey execution</li>
                </ul>

            </div>
        </section>

        <!-- EXPERIENCE -->
        <section class="section-transportation dark center">
            <div class="container">
                <h2>More Than Just Transportation</h2>

                <p>Comfort · Privacy · Style · Experience</p>

            </div>
        </section>

        <!-- AWARDS -->
        {{-- <section class="section-industry">
            <div class="container">
                <h2>Industry Recognition</h2>

                <ul class="list">
                    <li>Partners</li>
                    <li>Collaborations</li>
                    <li>Event associations</li>
                </ul>

            </div>
        </section> --}}
    </div>





@endsection
