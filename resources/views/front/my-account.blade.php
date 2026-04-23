@extends('front.common.layout')

@section('title', 'My Account')

@section('meta_description', 'solar')

@section('meta_keywords', 'solar')


{{-- <style>
.breadcrumb-bg {
    background-position: center;
    background-size: cover;
    padding: 125px 0!important;
}
.account-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
}
</style> --}}


@section('content')
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">My Account</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">My Account</span>
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
                                <div class="oc-newsletter text-dark">
                                    <h4 class="title lefts text-dark">My Account</h4>
                                    <a href="{{route('account')}}" class="linkmyaccount actives">Dashboard</a>
                                    <a href="{{route('orders')}}" class="linkmyaccount ">Order</a>
                                    <a href="{{route('accountdetail')}}" class="linkmyaccount ">Account Details</a>
                                    <a href="{{route('user.logout')}}" class="linkmyaccount">Logout</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 right-side-panel-profile">

                        <h4 class="account-title">Dashboard</h4>
                        <p>Hello {{ucfirst($user->name)}}, <strong></strong> (If Not {{ucfirst($user->name)}}<strong> !</strong> <a href="{{route('user.logout')}}">Logout</a> )
                        </p>
                        <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping
                            and billing addresses and edit your password and account details.
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->


@endsection
