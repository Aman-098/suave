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

                    <form id="contact_form">
                        {{-- <div class="form-row">
                            
                            
                        </div> --}}
                        <input type="text" id="name" name="name" placeholder="Your Name">
                        <span class="text-danger" id="nameError"></span>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                        <span class="text-danger" id="phoneError"></span>

                        <input type="email" id="email" name="email" placeholder="Email Address">
                        <span class="text-danger" id="emailError"></span>

                        <textarea id="message" name="message" placeholder="Write your message..."></textarea>
                        <span class="text-danger" id="messageError"></span>

                        <button type="submit">Send Message</button>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            //alert('hello world');

            $('#contact_form').submit(function(e) {
                e.preventDefault();

                // Clear old errors
                $('.text-danger').text('');

                var name = $('#name').val().trim();
                var phone = $('#phone').val().trim();
                var email = $('#email').val().trim();
                var message = $('#message').val().trim();

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Name validation
                if (name === '') {
                    showError('#nameError', 'Name is required.');
                    return false;
                }

                // Phone validation
                if (phone === '') {
                    showError('#phoneError', 'Phone is required.');
                    return false;
                }

                // Email validation
                if (email === '') {
                    showError('#emailError', 'Email is required.');
                    return false;
                } else if (!emailRegex.test(email)) {
                    showError('#emailError', 'Enter a valid email.');
                    return false;
                }

                // Message validation
                if (message === '') {
                    showError('#messageError', 'Message is required.');
                    return false;
                }

                var formdata = $(this).serialize();

                $.ajax({
                    url: "{{ route('contact.save') }}",
                    type: 'POST',
                    data: formdata,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === true) {
                            notyf.success(response.message);
                        } else {
                            notyf.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            notyf.error(xhr.responseJSON.message);
                        } else {
                            notyf.error('Something went wrong');
                        }
                    }
                });

                function showError(element, message) {
                    $(element).text(message).show();
                    setTimeout(() => {
                        $(element).fadeOut();
                    }, 3000);
                }
            });
        });
    </script>
@endpush
