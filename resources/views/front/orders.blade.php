@extends('front.common.layout')

@section('title', 'My Account | Orders')

@section('meta_description', 'My Account | Orders')

@section('meta_keywords', 'My Account | Orders')

@section('content')
    <!-- main-area -->
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Orders</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Orders</span>
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
                                    <a href="{{ route('orders') }}" class="linkmyaccount actives">Order</a>
                                    <a href="{{ route('accountdetail') }}" class="linkmyaccount ">Account Details</a>
                                    <a href="{{ route('user.logout') }}" class="linkmyaccount">Logout</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9">

                        <h4 class="account-title">Orders</h4>
                        <div class="account-table text-center m-t-30 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="no">S.No</th>
                                        <th class="name">Name</th>
                                        <th class="date">Date</th>
                                        <th class="status">Status</th>
                                        <th class="total">Total</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->name ?? 'N/A' }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>£ {{ $order->total ?? 0 }}</td>
                                            <td>
                                                <a href="#" class="ul-cart-update-cart-btn" data-bs-toggle="modal"
                                                    data-bs-target="#view_order" data-order='@json($order)'>
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-warning mb-0">
                                                    <strong>Oh!</strong> No order placed yet.
                                                    <a href="{{ route('front.products') }}">Buy Now</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->

    {{-- view order details --}}
    <div class="modal fade" id="view_order">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Details</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <!-- Order Info -->
                    <div class="mb-4 p-3 border rounded bg-light">
                        <h5 class="mb-3">Customer & Order Information</h5>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <strong>ORDER NUMBER:</strong> <span id="order_number"></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Name:</strong> <span id="order_name"></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Phone:</strong> <span id="order_phone"></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Address:</strong> <span id="order_address"></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Country:</strong> <span id="order_country"></span>
                            </div>

                            <div class="col-md-6 mb-2">
                                <strong>Postcode:</strong> <span id="order_postcode"></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Order Date:</strong> <span id="order_date"></span>
                            </div>
                            <div class="col-md-12 mb-2">
                                <strong>Additional note:</strong> <span id="order_note"></span>
                            </div>
                        </div>
                    </div>


                    <!-- Items Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price (£)</th>
                                </tr>
                            </thead>
                            <tbody id="orderItemsTable">
                                <!-- Items will be injected here via JS -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Subtotal</th>
                                    <th id="order_subtotal">£0</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Vat(20%)</th>
                                    <th id="order_vat">£0</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Shipping</th>
                                    <th id="order_shipping">£0</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Total</th>
                                    <th id="order_total">£0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#view_order').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var order = button.data('order'); // Get JSON object from data-order

                    // Fill customer info
                    $('#order_number').text(order.order_number);
                    $('#order_name').text(order.name);
                    $('#order_email').text(order.email);
                    $('#order_phone').text(order.phone);
                    $('#order_address').text(order.address);
                    $('#order_country').text(order.country);

                    $('#order_postcode').text(order.postcode);
                    $('#order_date').text(
                        new Date(order.created_at).toLocaleDateString('en-GB', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        })
                    );
                    if (order.note) {
                        $('#order_note').text(order.note);
                    } else {
                        $('#order_note').text('N/A');
                    }


                    $('#order_subtotal').html('£&nbsp;' + order.subtotal);
                    $('#order_vat').html('£&nbsp;' + order.vat);
                    $('#order_shipping').html('£&nbsp;' + order.shipping);
                    $('#order_total').html('£&nbsp;' + order.total);

                    // Clear previous items
                    $('#orderItemsTable').empty();

                    // Populate items
                    $.each(order.items, function(index, item) {
                        var row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.product_name}</td>
                                <td>${item.qty}</td>
                                <td>£&nbsp;${item.price}</td>
                            </tr>
                        `;
                        $('#orderItemsTable').append(row);
                    });
                });

                
            });
        </script>
    @endpush

@endsection
