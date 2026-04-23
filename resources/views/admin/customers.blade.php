@extends('admin.common.layout')

@section('title', 'Manage Customers')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Manage Customers</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}"><i
                                        class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Dashboard /
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Customers </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    {{-- <div class="me-2 mb-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-file-export me-1"></i>Export
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                            class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                            class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_cat"
                            class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                            Category</a>
                    </div> --}}
                    {{-- <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /Breadcrumb -->

            {{-- <div class="row">

                <!-- Total Category -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-primary flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Total Categories</p>
                                    <h4>{{ $total_category ?? 0 }}</h4>
                                    
                                </div>
                            </div>
                            <div id="total-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Total Category -->

                <!-- Total Category -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-success flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Active Category</p>
                                    <h4>{{ $active_category ?? 0 }}</h4>
                                </div>
                            </div>
                            <div id="active-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Total Category -->

                <!-- Inactive Category -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-danger flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Inactive Category</p>
                                    <h4>{{ $inactive_category ?? 0 }}</h4>
                                </div>
                            </div>
                            <div id="inactive-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Inactive Category -->
            </div> --}}

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Customers List</h5>

                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>

                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    {{-- <th>Order Date</th> --}}
                                    {{-- <th>Payment Status</th> --}}
                                    {{-- <th>Status</th>
                                    <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $index => $item)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->address }}</td>
                                        {{-- <td>
                                            {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}
                                        </td> --}}
                                        {{-- <td>
                                            @if ($item->payment_status == 'paid')
                                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Paid
                                                </span>
                                            
                                            @elseif($item->payment_status == 'pending')
                                                <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Pending
                                                </span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($item->status == 'confirmed')
                                                <span class="badge badge-primary d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Confirmed
                                                </span>
                                            @elseif($item->status == 'processing')
                                                <span class="badge badge-warning d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Processing
                                                </span>
                                            @elseif($item->status == 'delivered')
                                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Delivered
                                                </span>
                                            @endif
                                        </td> --}}

                                        {{-- <td>
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
                                        </td> --}}

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

@endsection

@push('scripts')
    
@endpush
