@extends('front.common.layout')

@section('title', 'Contact')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Contact Us</h1>

                <!-- <ul class="breadcrum">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">About us</a></li>
                            </ul> -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="contact-section">
        <div class="container">

            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">We are here to help you anytime</p>

            <!-- CONTACT CARDS -->
            <div class="contact-cards">
                <div class="contact-card">
                    <i class="fa-solid fa-phone"></i>
                    <h4>Call Us</h4>
                    <p>0808 168 0808</p>
                </div>

                <div class="contact-card">
                    <i class="fa-solid fa-envelope"></i>
                    <h4>Email</h4>
                    <p>info@suaveexecutivetravel.co.uk</p>
                </div>

                <div class="contact-card">
                    <i class="fa-solid fa-location-dot"></i>
                    <h4>Location</h4>
                    <p>United Kingdom</p>
                </div>
            </div>

            <!-- MAIN CONTACT -->
            <div class="contact-wrapper">

                <!-- FORM -->
                <div class="contact-form">
                    <h3>Send Message</h3>

                    <form>
                        <div class="form-row">
                            <input type="text" placeholder="Your Name">
                            <input type="tel" placeholder="Phone Number">
                        </div>

                        <input type="email" placeholder="Email Address">
                        <textarea placeholder="Write your message..."></textarea>

                        <button>Send Message</button>
                    </form>
                </div>

                <!-- MAP -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9478108.126193948!2d-4.4737716!3d54.55127985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1775622830947!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


                    <!-- <div class="map-overlay">
                                    <h4>Office Address</h4>
                                    <p>3 Uxbridge Rd, Hayes UB4 0JN</p>
                                </div> -->
                </div>

            </div>

        </div>
    </section>

@endsection
