@extends('front.common.layout')

@section('title', 'My Account')

@section('meta_description', 'My Account')

@section('meta_keywords', 'My Account')


@section('content')
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">My account</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">My account</span>
                </div>
            </div>
        </div>

        <div class="ul-cart-container">


            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col">
                    <form name="frm_login" id="login_form" method="post" class="contact-form">
                        @csrf
                        <input type="hidden" name="back" value="">
                        <h3 class="ul-checkout-title">EXISTING CUSTOMER</h3>
                        <p>Login to your account</p>
                        <div class="row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value="" 
                                    placeholder="Email *">
                                <span class="text-danger" id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" value="" 
                                    placeholder="Password *">
                                <span class="text-danger" id="passwordError"></span>
                            </div>
                            <div class="bottom-inner-login-panel">
                                <button type="submit" name="submit" value="signin"
                                    class="ul-checkout-form-btn">Submit</button>
                                <a href="forgot.php" class="orange">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col register-account-panel">
                    <div class="inner-register-panel">
                        <h3 class="ul-checkout-title">CREATE AN ACCOUNT</h3>
                        <p>Creating an account with us is quick and easy, and will allow you to simply access your details
                            when you return to the site. You can add multiple delivery addresses, track your order and much
                            more.</p>
                        <form name="frm_register" id="register_form" method="post" class="contact-form">
                            @csrf
                            <div class="row">

                                <div class="form-group">
                                    <input type="text" name="name" value="" required placeholder="Name *">

                                </div>
                                <div class="form-group">
                                    <input type="text" name="number" value="" required
                                        placeholder="Telephone No*">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="" required placeholder="Your Email *">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="" required placeholder="Password *">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="address" value="" required placeholder="Address  *">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="city" value="" required placeholder="Town/City*">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="country" value="" required placeholder="country*">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="postcode" value="" required placeholder="Postcode*">
                                </div>

                            </div>
                            <button class="ul-checkout-form-btn" type="submit" name="submit1"
                                value="submit1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>




        </div>

    </main>

    @push('scripts')
        <script>
            $(document).ready(function() {
            
                // login account
                $('#login_form').submit(function(e) {
                    e.preventDefault();

                    var email = $('#email').val().trim();
                    var password = $('#password').val();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


                    // Email validation
                    if (email === '') {
                        showError('#emailError', 'Email is required.');
                        return false;
                    } else if (!emailRegex.test(email)) {
                        showError('#emailError', 'Enter a valid email.');
                        return false;
                    }

                    // Password validation
                    if (password === '') {
                        showError('#passwordError', 'Password is required.');
                        return false;
                    }

                    var formdata = $(this).serialize();


                    // Ajax request
                    $.ajax({
                        url: "{{ route('user.login') }}",
                        type: 'POST',
                        data: formdata,
                        success: function(response) {
                            if (response.status === true) {
                                // toastr.success(response.message);
                                notyf.success(response.message);
                                // Reset form
                                $('#login_form')[0].reset();

                                // Redirect after 3 seconds
                                setTimeout(() => {
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

                });

                // registration form 
                $('#register_form').submit(function(e) {

                    if (!this.checkValidity()) {
                        return;
                    }

                    e.preventDefault(); 

                    let btn = $(this).find('button[type="submit"]');

                    btn.prop('disabled', true).text('Processing...');

                    $.ajax({
                        url: "{{ route('user.register') }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        dataType: 'json',

                        success: function(response) {
                            btn.prop('disabled', false).text('Submit');

                            if (response.status === true) {
                                notyf.success(response.message);
                                $('#register_form')[0].reset();

                                setTimeout(() => {
                                    window.location.href = response.redirect;
                                }, 2000);
                            } else {
                                notyf.error(response.message);
                            }
                        },

                        error: function(xhr) {
                            btn.prop('disabled', false).text('Submit');

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                let errors = xhr.responseJSON.errors;
                                Object.keys(errors).forEach(key => {
                                    notyf.error(errors[key][0]);
                                });
                            } else {
                                notyf.error('Something went wrong');
                            }
                        }
                    });
                });

                // Error show function
                function showError(element, message) {
                    $(element).text(message).show();
                    setTimeout(() => {
                        $(element).fadeOut();
                    }, 3000);
                }


            });
        </script>
    @endpush

@endsection
