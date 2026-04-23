@php
    if(Auth::check()){
        $cart_count = \App\Models\Cart::where('user_id', Auth::id())->count();
    } else {
        $cart = session('cart', []);
        $cart_count = count($cart);
    }
@endphp

{{-- @php
    $cart = session('cart', []);
    $cart_count = count($cart);
@endphp --}}


<div class="ul-sidebar">
    <div class="ul-sidebar-header">
        <div class="ul-sidebar-header-logo">
            <a href="index-2.html">
                <img src="{{asset('images/logo.png')}}" alt="" class="logo">
            </a>
        </div>
        <button class="ul-sidebar-closer"><i class="flaticon-close"></i></button>
    </div>
    <div class="ul-sidebar-header-nav-wrapper d-block d-lg-none"></div>
</div>

<header class="ul-header">
    <div class="ul-header-top">
        <marquee>Free delivery over £200</marquee>
        <!--  <marquee>Free UK Delivery on all orders above £100</marquee>  -->

    </div>
    <div class="ul-header-bottom">
        <div class="ul-container">
            <div class="ul-header-bottom-wrapper">
                <div class="header-bottom-left">
                    <div class="logo-container">
                        <a href="{{route('home')}}" class="d-inline-block"><img src="{{asset('images/logon.png')}}" class="logo"
                                alt="Logo"></a>
                    </div>
                    <div class="ul-header-search-form-wrapper flex-grow-1 flex-shrink-0">
                        <form method="GET" action="{{ route('front.products') }}" class="ul-header-search-form">
                            <div class="ul-header-search-form-right">
                                <input type="text" value="" name="keywords" placeholder="Search here...">
                                <button type="submit"><span class="icon"><i
                                            class="flaticon-search-interface-symbol"></i></span></button>
                            </div>
                        </form>
                        <button class="ul-header-mobile-search-closer d-xxl-none"><i
                                class="flaticon-close"></i></button>
                    </div>
                </div>
                <div class="ul-header-nav-wrapper">
                    <div class="to-go-to-sidebar-in-mobile">
                        <nav class="ul-header-nav">
                            <a href="{{route('home')}}">Home</a>
                            <div class="has-sub-menu has-mega-menu">
                                <a role="button" href="{{route('front.products')}}">Products</a>
                                <div class="ul-header-submenu ul-header-megamenu">

                                    <div class="single-col">

                                        <ul>
                                            @foreach ($header_categories as $item)
                                                <li><a href="{{ url('category/' . $item->slug) }}">{{ucfirst($item->name)}}</a></li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>
                            </div>
                            <a href="{{route('about')}}">About Us</a>
                            <a href="{{route('blog')}}">blog</a>
                            <a href="{{route('contact')}}">Contact Us</a>
                        </nav>
                    </div>
                </div>
                <div class="ul-header-actions">
                    <button class="ul-header-mobile-search-opener d-xxl-none"><i
                            class="flaticon-search-interface-symbol"></i></button>
                    <a href="{{route('account')}}"><i class="flaticon-user"></i></a>

                    <a href="{{route('wishlist')}}" class="cart-ico-count"><i class="flaticon-heart"></i><span class="wihslist-count">
                            {{$wishlist_count ?? 0}}</span></a>
                    <a href="{{route('cart')}}" class="cart-ico-count"><i class="flaticon-shopping-bag"></i><span class="cart-count">
                            {{$cart_count ?? 0}}</span></a>
                </div>
                <div>
                    <button class="ul-header-sidebar-opener"><i class="flaticon-hamburger"></i></button>
                </div>
            </div>
        </div>
    </div>
</header>
