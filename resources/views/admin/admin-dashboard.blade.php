@extends('admin.common.layout')

@section('title', 'Home')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Dashboard</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Admin /
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <!-- Welcome Wrap -->
            <div class="welcome-wrap mb-4">
                <div class=" d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mb-3">
                        <h2 class="mb-1 text-white">Welcome Back, {{ $name }} </h2>

                    </div>

                </div>

            </div>
            <!-- /Welcome Wrap -->

            <div class="row">

                <!-- Total booking -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md bg-dark mb-3">
                                    <i class="ti ti-users fs-16"></i>
                                </span>

                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h2 class="mb-1">{{ $total_bookings ?? 0 }}</h2>
                                    <p class="fs-13">Total Bookings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total booking -->

                <!-- comfirmed booking -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md bg-dark mb-3">
                                    <i class="ti ti-user-check fs-16"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h2 class="mb-1">{{ $completed_bookings ?? 0 }}</h2>
                                    <p class="fs-13">Confirmed Bookings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /comfirmed booking -->

                <!-- comfirmed booking -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="avatar avatar-md bg-dark mb-3">
                                    <i class="ti ti-user-off fs-16"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h2 class="mb-1">{{ $cancelled_bookings ?? 0 }}</h2>
                                    <p class="fs-13">Cancelled Bookings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /comfirmed booking -->
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Booking Enquiry</h5>

                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>

                                    <th>S.No</th>
                                    <th>Fleet Name</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Pickup Date</th>
                                    <th>Return Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $item)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->fleet_name }}</td>

                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item['pickup_date'])->format('d M Y') }}
                                        </td>
                                         <td>
                                            {{ \Carbon\Carbon::parse($item['return_date'])->format('d M Y') }}
                                        </td>
                                        <td>{{ $item->message ?? '-' }}</td>
                                       
                                        <td>
                                            @if ($item->status == 'confirmed')
                                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Confirmed
                                                </span>
                                            @elseif($item->status == 'pending')
                                                <span class="badge badge-warning d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Pending
                                                </span>
                                            @elseif($item->status == 'cancelled')
                                                <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Cancelled
                                                </span>
                                            @endif
                                        </td>


                                        <td>
                                            <div class="action-icon d-inline-flex">

                                                <!-- View -->
                                                <a href="#" class="me-2 viewBtn" data-bs-toggle="modal"
                                                    data-bs-target="#view_order" data-order='@json($item)'>
                                                    <i class="ti ti-eye"></i>
                                                </a>


                                                <!-- Edit -->
                                                <a href="#" class="me-2 editBtn" data-bs-toggle="modal"
                                                    data-bs-target="#edit_cat" data-id="{{ $item->id }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>



                                                <!-- Delete -->
                                                <a href="javascript:void(0);" class="deleteBtn" data-bs-toggle="modal"
                                                    data-bs-target="#delete_modal" data-id="{{ $item->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <x-footer-component />

    </div>
    <!-- /Page Wrapper -->

    {{-- edit status --}}

    <div class="modal fade" id="edit_cat">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Order Status</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="#" id="edit_cat_from" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <input type="hidden" name="edit_id" id="edit_id" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status<span class="text-danger"> *</span></label>
                                    <select class="select" name="status" id="edit_status">
                                        <option value="confirmed">Confirmed</option>
                                        <option value="processing">Processing</option>
                                        <option value="delivered">Delivered</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit status -->

    {{-- view order details --}}
    <div class="modal fade" id="view_order">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Details</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
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
                    if(order.note){
                        $('#order_note').text(order.note);
                    }else{
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

                // Edit Status
                $('#edit_cat_from').submit(function(e) {
                    e.preventDefault();

                    var edit_id = $('#edit_id').val();
                    // Prepare FormData
                    var formData = new FormData(this);

                    // CSRF setup
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var url = "{{ route('edit.order', ':id') }}";
                    url = url.replace(':id', edit_id);

                    // AJAX request
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === true) {
                                toastr.success(response.message);
                                $('#edit_cat').modal('hide');
                                setTimeout(() => {
                                    window.location.href =
                                        "{{ route('admin.dashboard') }}";
                                }, 2000);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(xhr) {
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                let errors = xhr.responseJSON.errors;
                                for (const key in errors) {
                                    toastr.error(errors[key][0]);
                                }
                            } else {
                                toastr.error('Something went wrong');
                            }
                        }
                    });
                });
            });

            // edit category modal
            $(document).on('click', '.editBtn', function() {
                let userId = $(this).data('id');
                let url = "{{ route('edit.order', ':id') }}";
                url = url.replace(':id', userId);

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(res) {
                        let data = res.order;

                        $('#edit_id').val(data.id);
                        $('#edit_status').val(data.status).trigger('change');
                    },
                    error: function(err) {
                        // console.error(err);
                        toastr.error('Failed to fetch status');
                    }
                });
            });
        </script>
    @endpush


@endsection
