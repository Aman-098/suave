@extends('front.common.layout')

@section('title', 'Wishlist')

@section('meta_description', 'solar')

@section('meta_keywords', 'solar')

@section('content')

    <main>
        <!-- BREADCRUMB SECTION START -->
        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Wishlist</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Wishlist</span>
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
                            {{-- <div class="ul-products-sidebar-widget ul-products-search">
                                <form name="frm_search" class="ul-products-search-form" action="#">
                                    <input type="text" name="keywords" value="" placeholder="Search Items">
                                    <button type="submit"><i class="flaticon-search-interface-symbol"></i></button>
                                </form>
                            </div> --}}

                            <div class="ul-products-sidebar-widget ul-products-categories">
                                <h3 class="ul-products-sidebar-widget-title">Categories</h3>
                                <div class="ul-products-categories-link">
                                    @foreach ($header_categories as $item)
                                        <a href="{{ url('category/' . $item->slug) }}">
                                            {{ strtoupper($item->name) }}</a>
                                    @endforeach


                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- right products container -->
                    <div class="col-lg-9 col-md-8 bet-cat-products-product">
                        @if ($wishlistItems->isEmpty())
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Your wishlist is empty

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row ul-bs-row row-cols-lg-3 row-cols-2 row-cols-xxs-1">
                            @foreach ($wishlistItems as $item)
                                <div class="col">
                                    <div class="ul-product" style="position: relative;">
                                        <div class="ul-product-heading">
                                            <span class="ul-product-price">&pound;{{ $item->product->price }}</span>
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

                                        {{-- delete icon --}}
                                        <button class="wishlist-remove" data-id="{{ $item->product->id }}"
                                            style="position:absolute; top:-9px; right:-2px; z-index:10; background:#fff; border:none; width:30px; height:30px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer;">

                                            <i class="flaticon-close" style="color:#000; font-size:14px;"></i>
                                        </button>

                                        <div class="ul-product-img">
                                            <a href="{{ url('product/' . $item->product->slug) }}">
                                                <img src="{{ asset('storage/' . $item->product->image1) }}"
                                                    alt="Product Image">
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
                                                    href="{{ url('product/' . $item->product->slug) }}">{{ $item->product->name }}</a>
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
            $(document).ready(function(e) {

                // delete wishlit item
                $(document).on('click', '.wishlist-remove', function() {

                    let btn = $(this);
                    let id = btn.data('id');
                    let card = btn.closest('.col'); // 🔥 FIX

                    btn.prop('disabled', true);

                    $.ajax({
                        url: "{{ route('wishlist.delete.single') }}",
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            id: id
                        }, // 🔥 JSON stringify hata diya (not needed)

                        success: function(data) {
                            if (data.status) {
                                notyf.success(data.message || 'Removed');

                                // animation
                                card.css({
                                    transition: 'all 0.3s ease',
                                    opacity: '0',
                                    transform: 'scale(0.9)'
                                });

                                setTimeout(() => {
                                    card.remove();
                                }, 100);

                                setTimeout(() => {
                                    location.reload();
                                }, 1000);

                            } else {
                                btn.prop('disabled', false);
                                notyf.error(data.message || 'Could not remove item');
                            }

                            if (data.wishlist_count !== undefined) {
                                $('.wihslist-count').text(data.wishlist_count);
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
