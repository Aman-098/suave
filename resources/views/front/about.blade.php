@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

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
                            <img src="{{asset('assets_front/img/ferrari-about.jpeg')}}">
                        </div>
                    </div>
                    <div class="about-left">
                        <h2>About Us</h2>

                        <p>Suave Executive Travel was founded by Jagmeet Singh and Balmeet Singh Gulati, two entrepreneurs with a passion for luxury vehicles and delivering exceptional customer experiences. Their vision was to build a modern luxury car hire brand that combines world-class vehicles with reliable, personalised service.</p>

                        <p>Whether you’re hiring a vehicle for a special occasion, business travel, a weekend experience or a luxury event, our goal is to provide a seamless and unforgettable service. At Suave Executive Travel, every journey is designed to reflect sophistication, prestige and attention to detail.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- JOURNEY -->
        <section class="section dark journey-section">
            <div class="container">
                <h2>Our Journey</h2>
                <p></p>
                <p>Since launching the company, the founders have grown Suave Executive Travel into a trusted name within the luxury travel space. The brand is frequently chosen for celebrity appearances, music video shoots, luxury events and high-profile content productions, as well as by business owners and professionals seeking premium vehicles for important occasions.</p>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="section-whatoffer">
            <div class="container">
                <h2>What We Offer</h2>
                <ul class="list">
                    <li>Executive chauffeur services</li>
                    <li>Luxury & supercar self-drive hire</li>
                    <li>Corporate travel solutions</li>
                    <li>Airport transfers</li>
                    <li>Wedding & special occasion transport</li>
                    <li>Photo & video shoot vehicle hire</li>
                    <li>Long-term vehicle hire solutions</li>
                </ul>
                <p class="extra">
                    Our fleet includes prestigious brands such as Lamborghini, Rolls-Royce,BMW, Audi,
                    Bentley and more, ensuring every client enjoys a premium experience tailored to their
                    expectations.
                </p>
            </div>
        </section>

        <!-- COVERAGE -->
        <section class="section dark coverage-section">
            <div class="container">
                <h2>Nationwide Luxury Coverage</h2>

                <p>Although our operations are London-based, our services extend across the United Kingdom.
                    Whether you require executive transport in major cities or luxury travel for countryside
                    journeys, our professional chauffeurs and premium vehicles are available nationwide.</p>
            </div>
        </section>

        <!-- WHY US -->
        <section class="section-whychoose">
            <div class="container">
                <h2>Why Choose Suave Executive Travel</h2>
                <ul class="check">
                    <li>Premium luxury vehicle fleet</li>
                    <li>Professional and experienced chauffeurs</li>
                    <li>Flexible hire packages</li>
                    <li>Corporate and private travel solutions</li>
                    <li>Nationwide service availability</li>
                    <li>24/7 customer support assistance</li>
                </ul>
                <p>Every booking is handled with precision to ensure a smooth, safe and memorable journey.</p>
            </div>
        </section>

        <!-- COMMITMENT -->
        <section class="section dark commitment-section">
            <div class="container">
                <h2>Our Commitment to Excellence</h2>
                <p>At Suave Executive Travel, we believe luxury travel should be effortless and enjoyable. From
                    the moment you enquire about a vehicle to the completion of your journey, our dedicated team
                    ensures a seamless experience with personalised service and attention to detail at every
                    step.</p>
                <p>Our goal is to continue building long-term relationships with our clients by consistently
                    delivering reliability, comfort, and exceptional service standards.</p>
            </div>
        </section>

        <!-- CTA -->
        <section class="section-travel-pro center ">
            <div class="container">
                <h2>Travel in Style with Confidence</h2>
                <p>Whether you're attending a corporate meeting, celebrating a special occasion, planning a
                    luxury weekend experience, or arranging transport for an important event, Suave Executive
                    Travel is your trusted partner for executive chauffeur and prestige car hire across the UK.
                </p>
                <p><strong>Contact our team today to discuss your travel requirements.</strong></p>
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

                <a href="{{route('fleets')}}" class="review-btn">Explore Our Cars →</a>
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
