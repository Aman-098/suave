@extends('front.common.layout')

@section('title', 'Products')

@section('meta_description', 'solar')

@section('meta_keywords', 'solar')

@section('content')


    <main>
        <!-- BREADCRUMB SECTION START -->
        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Products</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Shop</span>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB SECTION END -->

        <!-- MAIN CONTENT SECTION START -->
        <div class="ul-inner-page-container product-page-panel">
            <div class="ul-inner-products-wrapper">
                <div class="row ul-bs-row flex-column-reverse flex-md-row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ul-products-sidebar">
                            <div class="ul-products-sidebar-widget ul-products-search">
                                <form method="GET" name="frm_search" class="ul-products-search-form"
                                    action="{{ route('front.products') }}">
                                    <input type="text" name="keywords" value="" placeholder="Search Items">
                                    <button type="submit"><i class="flaticon-search-interface-symbol"></i></button>
                                </form>
                            </div>

                            <div class="ul-products-sidebar filter-nwst-sec">
                                <form method="GET" action="{{ route('front.products') }}" name="frm_filter">
                                    <select name="sort_by" onchange="this.form.submit()" class="nwst-fltr">
                                        <option value="">Sort by newness</option>
                                        <option value="1">Title A-Z </option>
                                        <option value="2">Title Z-A</option>
                                        <option value="3">Price Low-High</option>
                                        <option value="4" selected>Price High-Low</option>
                                        <option value="5">Most Recent</option>
                                        {{-- <option value="6">Relevance</option> --}}
                                    </select>
                                </form>
                            </div>

                            <div class="widget">
                                <h4 class="widget-title">Price Filter</h4>
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <span>Price :</span>

                                        <input type="text" id="amount" name="price"
                                            placeholder="Add Your Price" /><Br>

                                                
                                        <input type="submit" onclick="applyPrice()" style="background:#2c2c2c; " name="pricing" value="Apply">

                                    </div>
                                </div>
                            </div>

                            <div class="ul-products-sidebar-widget ul-products-categories">
                                <h3 class="ul-products-sidebar-widget-title">Categories</h3>
                                <div class="ul-products-categories-link">
                                    @foreach ($categories as $item)
                                        <a href="{{ url('category/' . $item->slug) }}">
                                            {{ strtoupper($item->name) }}<span>({{ $item->products_count }})</span></a>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- right products container -->
                    <div class="col-lg-9 col-md-8 bet-cat-products-product">
                        <div class="row ul-bs-row row-cols-lg-3 row-cols-2 row-cols-xxs-1">
                            @foreach ($products as $item)
                                <div class="col">
                                    <div class="ul-product">
                                        <div class="ul-product-heading">
                                            <span class="ul-product-price">&pound;{{ $item->price }}</span>
                                            <span class="rating product-rating-layout">
                                                <div class="rating1 ">
                                                    <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="ul-product-img">
                                            <a href="{{ url('product/' . $item->slug) }}">
                                                <img src="{{ asset('storage/' . $item->image1) }}" alt="Product Image">
                                            </a>

                                            <!-- <div class="ul-product-actions">
                                                                        <a href="javascript:void(0)" onclick="sendtocart('67')"><i class="flaticon-shopping-bag"></i></a>
                                                                    </div> -->
                                        </div>

                                        <div class="ul-product-txt">
                                            <!-- <div class="ul-product-rating">
                                                                     <div class="rating1 ">
                                                                        <i class="flaticon-star"></i>
                                                                        <i class="flaticon-star"></i>
                                                                        <i class="flaticon-star"></i>
                                                                        <i class="flaticon-star"></i>
                                                                        <i class="flaticon-star"></i>
                                                                        </div>
                                                                    </div> -->
                                            <h4 class="ul-product-title"><a
                                                    href="{{ url('product/' . $item->slug) }}">{{ $item->name }}</a>
                                            </h4>
                                            <!-- <div class="ul-product-heading">
                                                                        <span class="ul-product-price">&pound;970.00</span>
                                                                    </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            // price filter range on products page
            $("#slider-range").slider({
                range: true,
                min: 1,
                max: 889,
                values: [1, 889],
                slide: function(event, ui) {

                    // UI me symbol dikhao
                    $("#amount").val("£" + ui.values[0] + " - £" + ui.values[1]);

                    // hidden raw value store karo
                    $("#amount").attr("data-value", ui.values[0] + "-" + ui.values[1]);
                }
            });

            // default set
            $("#amount").val("£1 - £889");
            $("#amount").attr("data-value", "1-889");

            function applyPrice() {
                let price = $('#amount').attr('data-value'); // raw value
                let url = "{{ route('front.products') }}?price=" + price;
                window.location.href = url;
            }
        </script>
    @endpush

@endsection
