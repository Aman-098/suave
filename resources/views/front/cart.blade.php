@extends('front.common.layout')

@section('title', 'Cart')

{{-- <style>
    .disabled {
        pointer-events: none;
        opacity: 0.4;
    }
</style> --}}

@section('content')

    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Cart List</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="index.html"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Cart List</span>
                </div>
            </div>
        </div>

        <div class="ul-cart-container">
            <div class="cart-top">
                <div class="text-center">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- cart header -->
                    <div class="ul-cart-header">
                        <div>Product</div>
                        <div>Price</div>
                        <div>Quantity</div>
                        <div>Subtotal</div>
                        <div>Remove</div>
                    </div>
                    <div>
                        @if (count($cart) > 0)
                            @foreach ($cart as $key => $item)
                                <div class="ul-cart-item">
                                    <div class="ul-cart-product">
                                        <a href="javascript:void(0);" class="ul-cart-product-img"><img
                                                src="{{ asset('storage/' . $item['image']) }}" alt=""></a>

                                        <a class="ul-cart-product-title" href="javascript:void(0);">{{ $item['title'] }}</a>
                                    </div>
                                    <span class="ul-cart-item-price">&pound;{{ number_format($item['price'], 2) }}</span>

                                    <td class="product-quantity">
                                        <div class="cart-plus-minus ">
                                            <span class="num-block">
                                                <input type="text" class="in-num qts quantity"
                                                    value="{{ $item['qty'] }}" readonly>

                                                <div class="qtybutton-box">
                                                    <span class="plus plus-btn" data-key="{{ $key }}"><img
                                                            src="img/icon/plus.png" alt=""></span>
                                                    <span class="minus minus-btn {{ $item['qty'] <= 1 ? 'disabled' : '' }}"
                                                        data-key="{{ $key }}">
                                                        <img src="img/icon/minus.png" alt="">
                                                    </span>
                                                </div>
                                            </span>

                                        </div>
                                    </td>
                                    <span
                                        class="ul-cart-item-subtotal row-total">&pound;{{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                    <div class="ul-cart-item-remove">
                                        <a href="javascript:void(0)" class="btn-remove" data-id="{{ $item['id'] }}"
                                            data-key="{{ $key }}"><i class="flaticon-close"></i></a>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center mt-5">
                                <h5 class="mb-3 text-dark">🛒 Your cart is empty</h5>
                                <p class="text-muted mb-4">
                                    Looks like you haven’t added anything yet.
                                </p>
                            </div>
                        @endif

                    </div>
                </div>

                <div>
                    <div class="ul-cart-actions">
                        <div class="ul-cart-coupon-code-form-wrapper">
                            <a href="{{ route('front.products') }}">
                                <button class="standard-btn-cls" name="shopping" type="button">Continue Shopping</button>
                            </a>

                        </div>
                        @if (count($cart) > 0)
                            <a href="{{ route('delete.cart') }}">
                                <button name="update" type="button" class="ul-cart-update-cart-btn">Delete All
                                    Items</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="cart-bottom">
                <div class="ul-cart-expense-overview">
                    <h3 class="ul-cart-expense-overview-title">Total</h3>
                    <div class="middle">
                        <div class="single-row">
                            <span class="inner-title" data-subtotal="{{ $subtotal }}">Subtotal</span>
                            <span class="number" id="subtotal">&pound; {{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="single-row">
                            
                            <span class="inner-title" data-subtotal="{{ $shipping }}">Shipping Fee</span>
                            @if($shipping==0)
                                <span class="number" id="shipping-amount">------</span>
                            @else
                                <span class="number" id="shipping-amount">£{{ number_format($shipping, 2) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="single-row">
                            <span class="inner-title" data-subtotal="{{ $grand_total }}">Total</span>
                            <span class="number" id="grand_total">&pound;{{ number_format($grand_total, 2) }}</span>
                        </div>
                        @if (count($cart) > 0)
                            <a href="{{route('checkout')}}" class="ul-cart-checkout-direct-btn">CHECKOUT</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            $(document).ready(function() {

                // Increase quantity

                $('.plus-btn').on('click', function() {

                    let btn = $(this);
                    let key = btn.data('key');

                    let input = btn.closest('.cart-plus-minus').find('input.quantity');

                    let qty = parseInt(input.val()) || 0;

                    // qty++;  

                    updateCartQty(key, qty, input);
                });


                // Decrease quantity

                $('.minus-btn').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    let btn = $(this);
                    let key = btn.data('key');

                    let input = btn.closest('.cart-plus-minus').find('input.quantity');

                    let qty = parseInt(input.val()) || 0;

                    // if (qty > 1) qty--;


                    updateCartQty(key, qty, input);
                });

                // AJAX function to update quantity in session

                function updateCartQty(key, qty, inputField) {
                    $.ajax({
                        url: "{{ route('cart.update.qty') }}",
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        contentType: 'application/json',
                        data: JSON.stringify({
                            key: key,
                            qty: qty
                        }),
                        success: function(data) {
                            if (data.status) {
                                inputField.val(qty);

                                let row = inputField.closest('.ul-cart-item');

                                row.find('.row-total')
                                    .text('£' + parseFloat(data.row_total).toFixed(2));

                                $('#subtotal').text('£' + parseFloat(data.subtotal).toFixed(2));
                                $('#shipping-amount').text('£' + parseFloat(data.shipping).toFixed(2));
                                $('#grand_total').text('£' + parseFloat(data.grand_total).toFixed(2));

                            } else {
                                notyf.error(data.message || 'Could not update quantity');
                            }
                        },
                        error: function() {
                            notyf.error('Something went wrong');
                        }
                    });
                }


                // delete single item
                $('.btn-remove').on('click', function() {
                    let btn = $(this);
                    let key = btn.data('key');

                    $.ajax({
                        url: "{{ route('cart.delete.single') }}",
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        contentType: 'application/json',
                        data: JSON.stringify({
                            key: key
                        }),
                        success: function(data) {
                            if (data.status) {
                                notyf.success(data.message || 'Cart item removed');

                                if ($('.cart-count').length && data.cart_count !== undefined) {
                                    $('.cart-count').text(data.cart_count);
                                }

                                $('#subtotal').text('£' + data.subtotal);
                                $('#shipping-amount').text('£' + parseFloat(data.shipping).toFixed(
                                    2));
                                $('#grand_total').text('£' + data.grand_total);

                                btn.closest('.ul-cart-item').fadeOut(300, function() {
                                    $(this).remove();

                                    // check if cart empty
                                    if ($('.ul-cart-item').length === 0) {
                                        location.reload();
                                    }
                                });


                            } else {
                                notyf.error(data.message || 'Could not remove item');
                            }
                        },
                        error: function() {
                            notyf.error('Something went wrong');
                        }
                    });
                });

            });
        </script>
    @endpush



@endsection
