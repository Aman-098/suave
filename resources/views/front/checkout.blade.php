@extends('front.common.layout')

@section('title', 'Checkout')

@section('meta_description', 'solar.')

@section('meta_keywords', 'solar')

<style>
    .ajbx {
        color: #000000;
    }

    .bggrey {
        height: 100px !important;
    }

    .ssm {
        padding-top: 35px !important;
    }

    .breadcrumb-bg {
        padding: 85px 0;
    }

    .breadcrumb-content {
        padding-top: 50px;
    }

    .qts {
        position: relative;
        width: 100%;
        border: 1px solid #f0f0f0;
        padding: 15px 45px 15px 15px;
        text-align: center;
        height: 55px;
        font-family: 'Jost', sans-serif;
        color: #544842;
        font-weight: 500;
    }

    .shop-cart-widget ul li>span {
        width: 46%;
        color: #312620;
        font-weight: 600;
    }

    .shop-cart-widget ul li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        font-family: 'Jost', sans-serif;
        color: #312620;
        font-weight: 600;
    }

    .shop-cart-widget ul li.sub-total {
        border-bottom: 1px dashed #c5c6c6 !important;
        padding-bottom: 15px;
    }
</style>

@section('content')

    <main>
        <!-- BREADCRUMB SECTION START -->
        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Checkout</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Checkout</span>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB SECTION END -->

        <!-- CHEKOUT SECTION START -->
        <div class="ul-cart-container">

            <h3 class="ul-checkout-title">Shipping details</h3>

            <form name="frm_ship" id="frm_ship" class="checkout-form ul-checkout-form">
                @csrf
                <div class="row ul-bs-row row-cols-2 row-cols-xxs-1">
                    <!-- left side / checkout form -->
                    <div class="col lft-check-sec">
                        <div class="row row-cols-lg-2 row-cols-1 ul-bs-row">
                            <!-- name -->
                            <div class="form-group col-lg-12">
                                <label for="fName">NAME <span>*</span></label>
                                <input type="text" name="name" id="name" value="">
                                <span class="text-danger" id=nameError></span>
                            </div>

                            <!-- country -->

                            <div class="col-lg-6 form-group ul-checkout-country-wrapper">
                                <label for="ul-checkout-country">Country*</label>
                                <select class="country-col country" name="country" id="ul-checkout-country">
                                    <option value="">Select Country--</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->code }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger" id=countryError></span>

                            </div>

                            <!-- postcode -->
                            <div class="col-lg-6 form-group">
                                <label for="cName">Post Code</label>
                                <input type="text" name="postcode" id="postcode" value="">
                                <span class="text-danger" id=postcodeError></span>
                            </div>

                            <!-- phone -->
                            <div class="col-lg-12 form-group ul-checkout-country-wrapper">
                                <label for="cName">Phone</label>
                                <input type="text" name="phone" id="phone" value="">
                                <span class="text-danger" id=phoneError></span>
                            </div>

                            <!-- address 1 -->
                            <div class="col-lg-12 form-group">
                                <label for="address">STREET ADDRESS <span>*</span></label>
                                <input type="text" id="address" name="address" value="">
                                <span class="text-danger" id=addressError></span>
                            </div>

                            <!-- note -->
                            <div class="col-lg-12 form-group">
                                <label for="message">ORDER you have NOTES <small>(OPTIONAL)</small></label>
                                <textarea name="notes" id="notes" placeholder="About Your Special Delivery Notes"></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- right side / different address -->
                    <div class="col">

                        <div class="ul-checkout-bill-summary">

                            <div class="shop-cart-widget">
                                <ul>

                                    <!-- SUBTOTAL -->
                                    <li class="sub-total" style="border-bottom:0px;">
                                        <span>SUBTOTAL</span> &pound;&nbsp;
                                        <span id="subtotal">
                                            <span id="subtotal-value">{{ number_format($subtotal ?? 0, 2) }}</span>
                                            <span id="subtotal-label">(ex. VAT)</span>
                                        </span>
                                    </li>

                                    <!-- VAT -->
                                    <li class="sub-total" id="vat-row"
                                        style="border-bottom:0px; {{ ($vat ?? 0) == 0 ? 'display:none;' : '' }}">
                                        <span>VAT(20%)</span>
                                        &pound;&nbsp;
                                        <span id="vat-amount">{{ number_format($vat ?? 0, 2) }}</span>
                                    </li>

                                    <!-- SHIPPING -->
                                    <li class="sub-total" id="shipping-row"
                                        style="border-bottom:0px; {{ ($shipping ?? 0) == 0 ? 'display:none;' : '' }}">
                                        <span>SHIPPING</span>
                                        &pound;&nbsp;
                                        <span id="shipping-amount">{{ number_format($shipping ?? 0, 2) }}</span>
                                        {{-- <span id="shipping-label">(ex. VAT)</span> --}}
                                    </li>

                                    <!-- FREE SHIPPING MESSAGE -->
                                    <li class="sub-total" id="free-shipping-msg"
                                        style="border-bottom:0px; {{ ($shipping ?? 0) != 0 ? 'display:none;' : '' }}">
                                        <p style="color:#f0314f;">Free UK Delivery on all orders above £200</p>
                                    </li>

                                    <span id="shipdiv"></span>

                                    <!-- TOTAL -->
                                    <li class="cart-total-amount" id="carttotalamount">
                                        <span>TOTAL</span>
                                        <span id="grand_total">£ {{ number_format($grand_total ?? 0, 2) }}</span>
                                    </li>

                                </ul>
                                <div class="payment-method-info">

                                    <div class="paypal-method-flex">
                                        <div class="payonline-sec">
                                            <input type="checkbox" checked disabled id="customCheck6">
                                            {{-- <input type="hidden" name="payment_method" value="2"> --}}

                                            <label for="customCheck6">Pay Online</label>
                                        </div>

                                        <div class="online-mmg"><img src="{{ asset('img/images/card.png') }}"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="payment-terms">
                                    <p>Shop in confidence, we accept all major credit cards.</p>
                                    <div class="internal-check-online">
                                        <input type="checkbox" checked disabled id="customCheck7">
                                        {{-- <input type="hidden" name="agree" value="1"> --}}

                                        <label for="customCheck7">
                                            I have read and agree to the website terms and conditions
                                        </label>
                                    </div>
                                </div><br>
                                <button class="ul-checkout-form-btn" type="submit" name="place_order"
                                    value="Place Order">Place order</button>

                            </div>


                        </div>




                    </div>
                </div>

            </form>

        </div>

        </div>
    </main>

    @push('scripts')
        <script>
            // vat and shipping charges
            $('#ul-checkout-country').on('change', function() {

                var country = $('#ul-checkout-country').val();

                $.ajax({
                    url: "{{ route('checkout.calculate') }}",
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        country: country
                    }),
                    success: function(data) {

                        if (data.status) {
                            // console

                            $('#subtotal-value').text(parseFloat(data.subtotal).toFixed(2));
                            $('#grand_total').text('£ ' + parseFloat(data.grand_total).toFixed(2));

                            // VAT
                            if (data.vat && data.vat != 0) {
                                $('#vat-row').show();
                                $('#vat-amount').text(parseFloat(data.vat).toFixed(2));
                            } else {
                                $('#vat-row').hide();
                            }

                            // SHIPPING
                            if (data.shipping == 0) {
                                $('#shipping-row').hide();
                                $('#free-shipping-msg').show();
                            } else {
                                $('#shipping-row').show();
                                $('#free-shipping-msg').hide();
                                $('#shipping-amount').text(parseFloat(data.shipping).toFixed(2));
                            }

                        } else {
                            notyf.error(data.message || 'Could not update amount');
                        }
                    },
                    error: function() {
                        notyf.error('Something went wrong');
                    }
                });

            });


            $('#frm_ship').submit(function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var country = $('#ul-checkout-country').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var postcode = $('#postcode').val();
                const nameRegex = /^[a-zA-Z\s]+$/;

                // Name validation
                if (name === '') {
                    showError('#nameError', 'Full Name is Required.');
                    return false;
                } else if (!nameRegex.test(name)) {
                    showError('#nameError', 'Enter a valid name.');
                    return false;
                }

                // country validation
                if (!country) {
                    showError('#countryError', 'Country is required.');
                    return false;
                }

                // phone validation
                if (phone === '') {
                    showError('#phoneError', 'Phone is Required.');
                    return false;
                }


                // address validation
                if (address === '') {
                    showError('#addressError', 'Street Address is Required.');
                    return false;
                }
                

                // postcode validation
                if (postcode === '') {
                    showError('#postcodeError', 'Postcode is Required.');
                    return false;
                }

                var formdata = $(this).serialize();

                $.ajax({
                    url: "{{ route('checkout.place.order') }}",
                    method: "POST",
                    data: formdata,
                    success: function(res) {
                        if (res.status) {
                            window.location.href = res.paypal_url;
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

            });


            // funtion for displaying error
            function showError(element, message) {
                $(element).text(message).show();
                setTimeout(() => {
                    $(element).fadeOut();
                }, 3000);
            }
        </script>
    @endpush

@endsection
