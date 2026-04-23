@extends('front.common.layout')

@section('title', $product->name)

@section('meta_description', 'solar.')

@section('meta_keywords', 'solar')

@section('content')


    <!-- main-area -->
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">{{ $product->name }}</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <a href="{{ url('category/' . $product->category->slug) }}">
                        {{ strtoupper($product->category->name) }}</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">{{ $product->name }}</span>
                </div>
            </div>
        </div>


        <!-- breadcrumb-area-end -->



        <!-- MAIN CONTENT SECTION START -->
        <div class="ul-inner-page-container">
            <div class="ul-product-details">
                <div class="ul-product-details-top">
                    <div class="row ul-bs-row row-cols-lg-2 row-cols-1 align-items-center">
                        <div class="product-container">
                            <!-- Main Image -->
                            <div class="zoom-container">
                                <img id="mainImage" src="{{ asset('storage/' . $product->image1) }}"
                                    data-zoom-image="{{ asset('storage/' . $product->image1) }}" />
                            </div>

                            <!-- Thumbnail Slider -->
                            <div class="thumbnail-slider">

                                @foreach (['image1', 'image2', 'image3', 'image4', 'video'] as $media)
                                    @if ($product->$media)
                                        <div class="thumb">

                                            @if ($media === 'video')
                                                <video width="100%" height="auto" controls>
                                                    <source src="{{ asset('storage/' . $product->$media) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ asset('storage/' . $product->$media) }}"
                                                    data-image="{{ asset('storage/' . $product->$media) }}"
                                                    data-zoom-image="{{ asset('storage/' . $product->$media) }}">
                                            @endif

                                        </div>
                                    @endif
                                @endforeach

                                {{-- @foreach (['image1', 'image2', 'image3', 'image4'] as $img)
                                    @if ($product->$img)
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $product->$img) }}"
                                                data-image="{{ asset('storage/' . $product->$img) }}"
                                                data-zoom-image="{{ asset('storage/' . $product->$img) }}">
                                        </div>
                                    @endif
                                @endforeach --}}

                            </div>

                        </div>

                        <div class="col">
                            <div class="ul-product-details-txt">

                                <div class="product-rating-detials">
                                    <p>{{ strtoupper($product->category->name) }}</p>
                                    <div class="ul-product-details-rating">
                                        <span class="rating">
                                            <div class="rating1 ">
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <form method="get" name="frm_cart" id="from_cart" action="#">
                                    <input type="hidden" name="pid" value="67">
                                    <h1 class="title">{{ $product->name }}
                                    </h1>

                                    <h3 class="ul-product-details-title">{{ $product->name }}</h3>
                                    <span class="ul-product-details-price">&pound;{{ $product->price }}</span>

                                    {{-- <p>Product Id : #67</p> --}}

                                    {{-- <script
                                        src="https://www.paypal.com/sdk/js?client-id=Ab1Z3mLN2WHTTZOFF-lqgREYlGv1ThY9-XaPh56dmnJXXtsPMYHLfaYr6WIx0-x4Y2XjQP4eC_s0cYXG&currency=GBP&components=messages">
                                    </script> --}}

                                    {{-- <div id="paypal-button-container"></div> --}}
                                    {{-- <script>
                                        paypal.Buttons({
                                            createOrder: function(data, actions) {
                                                return actions.order.create({
                                                    purchase_units: [{
                                                        amount: {
                                                            value: '970.00'
                                                        }
                                                    }]
                                                });
                                            }
                                        }).render('#paypal-button-container');
                                    </script>

                                    <div data-pp-message data-pp-amount="970.00">
                                    </div> --}}

                                    <div class="ul-product-details-option ul-product-details-quantity">
                                        <span class="title">Quantity</span>
                                        <div class="cart-plus-minus">
                                            <span class="num-block">
                                                <input type="text" class="in-num qts" name="qtys" id="qty-input"
                                                    value="1" readonly="">
                                                <div class="qtybutton-box">
                                                    <span class="plus"><img src="{{ asset('img/icon/plus.png') }}"
                                                            alt=""></span>
                                                    <span class="minus dis"><img src="{{ asset('img/icon/minus.png') }}"
                                                            alt=""></span>
                                                </div>
                                            </span>
                                        </div>
                                    </div>

                                </form>
                                <div class="ul-product-details-actions">
                                    <div class="left">
                                        <button data-id="{{ $product->id }}" class="add-to-cart add-to-cart-btn">Add to
                                            Cart <span class="icon"><i class="flaticon-cart"></i></span></button>

                                        <div class="wishlist-compare">
                                            <ul>
                                                <li id="bigh"><span>
                                                        {{-- <button data-id="{{ $product->id }}" class="add-to-wishlist wishlist-btn "><span
                                                                class="icon"><i class="flaticon-heart"></i></span> Add to
                                                            wishlist</button> --}}
                                                        @if (Auth::check())
                                                            <button data-id="{{ $product->id }}"
                                                                class="add-to-wishlist wishlist-btn">
                                                                <span class="icon"><i class="flaticon-heart"></i></span>
                                                                Add to wishlist
                                                            </button>
                                                        @else
                                                            <button class="add-to-wishlist  login-required">
                                                                <span class="icon"><i class="flaticon-heart"></i></span>
                                                                Add to wishlist
                                                            </button>
                                                        @endif
                                                    </span>&nbsp;


                                            </ul>
                                        </div>

                                    </div>
                                    <div class="share-options">
                                        <button><i class="flaticon-facebook-app-symbol"></i></button>
                                        <button><i class="flaticon-twitter"></i></button>
                                        <button><i class="flaticon-linkedin-big-logo"></i></button>
                                        <a href="#"><i class="flaticon-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ul-product-details-bottom">
                    <!-- description -->
                    <div class="ul-product-details-long-descr-wrapper">
                        <div class="product-desc-title mb-30">
                            <h4 class="title">Description :</h4>
                        </div>
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- main-area-end -->

    @push('scripts')
        <script>
            $(document).ready(function() {


                // Initialize ElevateZoom (once)
                $("#mainImage").elevateZoom({
                    zoomType: "lens",
                    lensShape: "round",
                    lensSize: 150
                });

                // Thumbnail click
                $(".thumb img").on("click", function() {

                    var newImage = $(this).data("image");
                    var newZoomImage = $(this).data("zoom-image");

                    // Change main image
                    $("#mainImage").attr("src", newImage);
                    $("#mainImage").data("zoom-image", newZoomImage);

                    // Remove old zoom instance safely
                    $.removeData($("#mainImage"), "elevateZoom");
                    $(".zoomContainer").remove();

                    // Reinitialize zoom
                    $("#mainImage").elevateZoom({
                        zoomType: "lens",
                        lensShape: "round",
                        lensSize: 150
                    });

                    // Active class
                    $(".thumb img").removeClass("active");
                    $(this).addClass("active");
                });

                // Slick slider
                $('.thumbnail-slider').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="flaticon-arrow-point-to-right"></i></button>',
                    dots: false,
                    infinite: false
                });

            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '.login-required', function() {
                    notyf.error('Please login to add products to your wishlist.');
                });

                // add to cart
                $('.add-to-cart-btn').on('click', function() {

                    let btn = $(this);
                    let id = btn.data('id');
                    let qty = parseInt($('#qty-input').val()) || 1;

                    let session = null;

                    // check session
                    if ($('#session').length > 0) {
                        session = $('#session').val();

                        if (!session) {
                            notyf.error('Please select a session');
                            return;
                        }
                    }

                    btn.prop('disabled', true);

                    $.ajax({
                        url: "{{ route('cart.add') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id: id,
                            qty: qty,
                            session: session // null bhi ho sakta hai
                        }),
                        success: function(res) {
                            btn.prop('disabled', false);
                            notyf.success(res.message || 'Added to cart');

                            if (res.cart_count !== undefined) {
                                $('.cart-count').text(res.cart_count);
                            }
                        },
                        error: function() {
                            btn.prop('disabled', false);
                            notyf.error('Something went wrong');
                        }
                    });
                });

                // add to wishlist
                $('.wishlist-btn').on('click', function() {

                    let btn = $(this);
                    let id = btn.data('id');

                    btn.prop('disabled', true);

                    $.ajax({
                        url: "{{ route('wishlist.add') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id: id,
                        }),
                        success: function(res) {
                            btn.prop('disabled', false);
                            notyf.success(res.message || 'Added to wishlist');

                            if (res.wishlist_count !== undefined) {
                                $('.wihslist-count').text(res.wishlist_count);
                            }
                        },
                        error: function() {
                            btn.prop('disabled', false);
                            notyf.error('Something went wrong');
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection
