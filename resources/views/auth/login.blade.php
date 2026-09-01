<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Ravair Solar">
    <meta name="keywords" content="Login to Ravair Solar">
    <meta name="author" content="Qorvatech">
    @env('staging')
        <meta name="robots" content="noindex, nofollow">
    @endenv

    @env('production')
        <meta name="robots" content="index, follow">
    @endenv

    <title>Suave SECURED ADMIN</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="bg-white">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="container-fuild">
            <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100 bg-primary-transparent">
							<div>
								<img src="assets/img/bg/authentication-bg-03.svg" alt="Img">
							</div>
						</div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                            <div class="col-md-7 mx-auto vh-100">
                                <form action="#" id="front_login_form" class="vh-100">
                                    @csrf
                                    <div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
                                        <div class=" mx-auto  text-center">
											<img src="{{asset('assets/img/logo.png')}}"
												class="img-fluid w-75" alt="Suave Executive Travel">
										</div>
                                        @if(session('error'))
                                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                        @endif

                                        <div class="">
                                            <div class="text-center mb-3">
                                                <h2 class="mb-2">Welcome back to Admin Panel</h2>
                                                <p class="mb-0">Log in to your account!</p>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <div class="input-group">
                                                    <input type="email" id="email" name="email" value=""
                                                        class="form-control border-end-0">
                                                    <span class="input-group-text border-start-0">
                                                        <i class="ti ti-mail"></i>
                                                    </span>
                                                </div>
                                                <span class="text-danger" id="emailError"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="pass-group">
                                                    <input type="password" id="password" name="password"
                                                        class="pass-input form-control">
                                                    <span class="ti toggle-password ti-eye-off"></span>
                                                </div>
                                                <span class="text-danger" id="passwordError"></span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
												
												{{-- <div class="text-end">
													<a href="{{route('forgot.password')}}" class="link-danger">Forgot
														Password?</a>
												</div> --}}
											</div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                            </div>
                                           
                                        </div>
                                        <div class="mt-5 pb-4 text-center">
                                            <p class="mb-0 text-gray-9">Copyright &copy; {{Date('Y')}} - Suave Executive Travel.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            //alert('hello world');

            $('#front_login_form').submit(function(e) {
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
                    url: "{{ route('login') }}",
                    type: 'POST',
                    data: formdata,
                    success: function(response) {
                        if (response.status === true) {
                            toastr.success(response.message);

                            // Reset form
                            $('#front_login_form')[0].reset();

                            // Redirect after 3 seconds
                            setTimeout(() => {
                                window.location.href = response.redirect;
                            }, 1000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            toastr.error(xhr.responseJSON.message);
                        } else {
                            toastr.error('Something went wrong');
                        }
                    }
                });

                // funtion for displaying error
                function showError(element, message) {
                    $(element).text(message).show();
                    setTimeout(() => {
                        $(element).fadeOut();
                    }, 3000);
                }


            });
        });
    </script>

</body>

</html>
