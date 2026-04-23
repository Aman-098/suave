@extends('front.common.layout')

@section('title', 'Contact Us')

@section('meta_description', 'solar.')

@section('meta_keywords', 'solar')

@section('content')

    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Contact Us</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Contact Us</span>
                </div>
            </div>
        </div>

        <!--  <section class="breadcrumb-area breadcrumb-bg bggrey">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="breadcrumb-content">
                                                <h2>Contact Us</h2>
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> -->


        <section class="ul-contact-infos">
            <!-- single contact info -->
            <div class="ul-contact-info">
                <div class="icon"><i class="flaticon-location"></i></div>
                <div class="txt">
                    <h6 class="title">Address</h6>
                    <p class="descr mb-0">Ravair Ltd
                        Unit 1, Durgates Industrial Estate, Wadhurst,
                        East Sussex,
                        TN5 6DF</p>
                </div>
            </div>

            <!-- single contact info -->
            <div class="ul-contact-info">
                <div class="icon"><i class="flaticon-email"></i></div>
                <div class="txt">
                    <h6 class="title">Email</h6>
                    <p class="descr mb-0">
                        <a href="mailto:sales@ravairsolar.com">sales@ravairsolar.com</a>

                    </p>
                </div>
            </div>

            <!-- single contact info -->
            <div class="ul-contact-info">
                <div class="icon"><i class="flaticon-stop-watch-1"></i></div>
                <div class="txt">
                    <h6 class="title">Phone</h6>
                    <p class="descr mb-0">
                        <span>+01892 750777</span>
                    </p>
                </div>
            </div>
        </section>
        <!-- CONTACT INFO SECTION END -->


        <!-- MAP AREA START -->
        <div class="ul-contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2506.2861894972557!2d0.2814678764433017!3d51.08472567172024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRavair%20Ltd%20Unit%201%2C%20Durgates%20Industrial%20Estate%2C%20Wadhurst%2C%20East%20Sussex%2C%20TN5%206DF!5e0!3m2!1sen!2sin!4v1734522903119!5m2!1sen!2sin"
                allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- MAP AREA END -->

        <div class="ul-contact-from-section">
            <div class="ul-contact-form-container">
                <h3 class="ul-contact-form-container__title">Get in Touch</h3>

                <form id="contact_form" name="frm_contact" class="ul-contact-form">
                    @csrf

                    <div class="grid">

                        <div class="form-group">
                            <div class="position-relative">
                                <input type="text" id="name" name="name" placeholder="Your Name *">

                                <span class="field-icon"><i class="flaticon-user"></i></span>
                            </div>
                            <span class="text-danger" id="nameError"></span>
                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <input type="text" id="phone" name="phone" placeholder="Your Phone">
                                <span class="field-icon"><i class="flaticon-user"></i></span>
                            </div>
                            <span class="text-danger" id="phoneError"></span>

                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <input type="email" id="email" name="email" placeholder="Your Email *">
                                <span class="field-icon"><i class="flaticon-email"></i></span>
                            </div>
                            <span class="text-danger" id="emailError"></span>
                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <textarea name="message" id="message" placeholder="Write Message..."></textarea>
                                <span class="field-icon"><i class="flaticon-edit"></i></span>
                            </div>
                            <span class="text-danger" id="messageError"></span>
                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <label><strong>Solve: 1 + 6 = ?</strong></label>
                                <input type="text" name="captcha" id="captcha" placeholder="Enter answer">
                                <span class="field-icon"><i class="flaticon-lock"></i></span>
                            </div>
                            <span id="captchaError" class="text-danger"></span>
                        </div>

                    </div>

                    <button class="btn" name="submit" value="signin">Submit</button>
                </form>
            </div>
        </div>
    </main>


    @push('scripts')
        <script>
            $(document).ready(function() {
                //alert('hello world');

                $('#contact_form').submit(function(e) {
                    e.preventDefault();

                    // Clear old errors
                    $('.text-danger').text('');

                    var name = $('#name').val().trim();
                    var phone = $('#phone').val().trim(); // ✅ fixed
                    var email = $('#email').val().trim();
                    var message = $('#message').val().trim();
                    var captcha = $('#captcha').val().trim();

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

                    // Captcha validation
                    if (captcha === '') {
                        showError('#captchaError', 'Captcha is required.');
                        return false;
                    }

                    if (captcha != '7') { // 1 + 6 = 7
                        showError('#captchaError', 'Wrong answer.');
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

                                setTimeout(() => {
                                    window.location.href =
                                        "{{route('thankyou')}}";
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


@endsection
