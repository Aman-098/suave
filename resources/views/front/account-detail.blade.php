@extends('front.common.layout')

@section('title', 'My Account Details')

@section('meta_description', 'My Account Details')

@section('meta_keywords', 'My Account Details')

@section('content')
    <!-- main-area -->
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Update Profile</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Update Profile</span>
                </div>
            </div>
        </div>

        <!-- blog-area -->
        <section class="blog-area pt-100 pb-100 my-account-profile">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-8">
                        <aside class="blog-sidebar">
                            <div class="widget blog-sidebar-widget mb-45">
                                <div class="oc-newsletter">
                                    <h4 class="title lefts text-dark">My Account</h4>
                                    <a href="{{ route('account') }}" class="linkmyaccount ">Dashboard</a>
                                    <a href="{{ route('orders') }}" class="linkmyaccount ">Order</a>
                                    <a href="{{ route('accountdetail') }}" class="linkmyaccount actives">Account Details</a>
                                    <a href="{{ route('user.logout') }}" class="linkmyaccount">Logout</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-wrap">
                            <div class="section-title title-style-three mb-30">
                                <h2 class="title">Account Details</h2>
                            </div>
                            <form method="post" action="#" id="change_account_detail" class="contact-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            placeholder="Your Name *">
                                    </div>
                                    <div class="col-md-12" style="height:10px; "></div>
                                    <div class="col-md-12">
                                        <h2 class="title">Change Password</h2>
                                    </div>
                                    <div class="col-md-12" style="height:10px; "></div>
                                    <div class="col-md-12">
                                        <input type="password" name="password" id="password" placeholder="Your Password *">
                                        <span class="text-danger" id="passwordError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="npassword" id="npassword" placeholder="New Password *">
                                        <span class="text-danger" id="npasswordError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password *">
                                        <span class="text-danger" id="cpasswordError"></span>
                                    </div>
                                </div>

                                <button class="ul-cart-update-cart-btn" name="submit" value="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->

    @push('scripts')
        <script>
            $('#change_account_detail').submit(function(e) {
                e.preventDefault();

                var password = $('#password').val();
                var npassword = $('#npassword').val();
                var cpassword = $('#cpassword').val();

                if (password === '') {
                    showError('#passwordError', 'Password is required.');
                    return false;
                }

                if (npassword === '') {
                    showError('#npasswordError', 'New Password is required.');
                    return false;
                }

                if (cpassword === '') {
                    showError('#cpasswordError', 'Enter Confirm Password');
                    return false;
                }

                if (npassword != cpassword) {
                    showError('#cpasswordError', 'Password do not match');
                    return false;
                }

                var formdata = $(this).serialize();

                $.ajax({
                    url: "{{ route('accountdetail') }}",
                    type: 'POST',
                    data: formdata,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === true) {
                            notyf.success(response.message);

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                            
                        } else {
                            notyf.error(response.message);
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
        </script>
    @endpush

@endsection
