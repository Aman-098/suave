@extends('front.common.layout')

@section('title', 'Contact Us | SUAVE Executive Travel')

@section('meta_description', 'Get in touch with SUAVE Executive Travel for luxury and supercar hire enquiries, bookings and quotes across London. Call 0808 168 0808.')

@section('meta_keywords', 'contact SUAVE Executive Travel, luxury car hire enquiry London')

<style>
    #contact_form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    text-align: left;
}

#contact_form input,
#contact_form textarea {
    width: 100%;
    margin-bottom: 15px;
}
</style>

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

            {{-- <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">Whether you're planning executive travel, hiring a luxury vehicle, arranging wedding transportation or looking for a prestige car for a special occasion, our team is here to help. Get in touch today for personalised assistance, expert recommendations and a seamless booking experience anywhere across the United Kingdom.</p> --}}

            <!-- CONTACT CARDS -->
            <div class="contact-cards">
                <div class="contact-card">
                    <i class="fa-solid fa-phone"></i>
                    <h4>Call Us</h4>
                    <p><a href="tel:08081680808" class="text-white">0808 168 0808</a></p>
                </div>

                <div class="contact-card">
                    <i class="fa-solid fa-envelope"></i>
                    <h4>Email</h4>
                    <p><a href="mailto:info@suaveexecutivetravel.co.uk"
                            class="text-white">info@suaveexecutivetravel.co.uk</a></p>

                </div>

                <div class="contact-card">
                    <i class="fa-solid fa-location-dot"></i>
                    <h4>Location</h4>
                    <p>Floor 1, Office no. 7, Second, 3 Uxbridge Rd, Hayes UB4 0JN, United Kingdom</p>
                </div>
            </div>

            <!-- MAIN CONTACT -->
            <div class="contact-wrapper">

                <!-- FORM -->
                <div class="contact-form">
                    <h3>Send Message</h3>

                    {{-- <form id="contact_form">
                        @csrf
                        <input type="text" id="name" name="name" placeholder="Your Name">
                        <span class="text-danger" id="nameError"></span>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                        <span class="text-danger" id="phoneError"></span>

                        <input type="email" id="email" name="email" placeholder="Email Address">
                        <span class="text-danger" id="emailError"></span>

                        <input type="text" id="vehicle" name="vehicle" placeholder="Vehicle Required">
                        <span class="text-danger" id="vehicleError"></span>

                        <input type="number" id="age_driver" name="age_driver" placeholder="Age of Driver">
                        <span class="text-danger" id="ageError"></span>

                        <label for="pickup">Pickup Date</label>
                        <input type="date" id="pickup" name="pickup_date">
                        <span class="text-danger" id="pickupError"></span>

                        <label for="return">Return Date</label>
                        <input type="date" id="return" name="return_date">
                        <span class="text-danger" id="returnError"></span>

                        <textarea id="message" name="message" placeholder="Write your message..."></textarea>
                        <span class="text-danger" id="messageError"></span>

                        <button type="submit">Send Message</button>
                    </form> --}}
                    <form id="contact_form">
                        @csrf

                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Your Name">
                        <span class="text-danger" id="nameError"></span>

                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                        <span class="text-danger" id="phoneError"></span>

                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address">
                        <span class="text-danger" id="emailError"></span>

                        <label for="vehicle">Vehicle Required</label>
                        <input type="text" id="vehicle" name="vehicle" placeholder="Vehicle Required">
                        <span class="text-danger" id="vehicleError"></span>

                        <label for="age_driver">Age of Driver</label>
                        <input type="number" id="age_driver" name="age_driver" placeholder="Age of Driver">
                        <span class="text-danger" id="ageError"></span>

                        <label for="pickup">Start Date</label>
                        <input type="date" id="pickup" name="pickup_date">
                        <span class="text-danger" id="pickupError"></span>

                        <label for="return">End Date</label>
                        <input type="date" id="return" name="return_date">
                        <span class="text-danger" id="returnError"></span>

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Write your message..."></textarea>
                        <span class="text-danger" id="messageError"></span>

                        <button type="submit">Send Message</button>
                    </form>
                </div>

                <!-- MAP -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.013711712184!2d-0.3959850476998569!3d51.51296443785538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761383db44a089%3A0xf16e9adb576e8dcf!2sSuave%20Executive%20Travel%20LTD!5e0!3m2!1sen!2sin!4v1782203778994!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                var vehicle = $('#vehicle').val().trim();
                var age = $('#age_driver').val().trim();
                var pickup = $('#pickup').val();
                var returnDate = $('#return').val();
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

                // Phone validation
                if (vehicle === '') {
                    showError('#vehicleError', 'Vehicle is required.');
                    return false;
                }

                if (age === '') {
                    showError('#ageError', 'Age is required.');
                    return false;
                }

                // Pickup
                if (pickup === '') {
                    showError('#pickupError', 'Pickup date is required.');
                    return false;
                }

                // Return
                if (returnDate === '') {
                    showError('#returnError', 'Return date is required.');
                    return false;
                }

                // Date logic
                if (returnDate < pickup) {
                    showError('#returnError', 'Return date must be after pickup date.');
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
                            $('#contact_form')[0].reset();

                            setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 1000);
                            
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
