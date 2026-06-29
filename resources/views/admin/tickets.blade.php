@extends('admin.common.layout')

@section('title', 'Contact Enquiry')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Contact Form Enquiry</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Dashboard /
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Form Enquiry</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!-- /Breadcrumb -->

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Enquiry List</h5>

                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Vehicle Required</th>
                                    <th>Age of Driver</th>
                                    <th>Message</th>
                                    <th>Submitted On</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ucfirst($item->name)}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->vehicle}}</td>
                                        <td>{{$item->age_driver}}</td>
                                        {{-- <td>{{ \Illuminate\Support\Str::words($item->message, 30, '...') }}</td> --}}
                                        <td>{{ $item->message ?? 'N/A'}}</td>

                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                        {{-- <td>
                                            @if($item->status == 'pending')
                                                <span class="badge bg-primary py-2 px-3">
                                                    <i class="ti ti-point-filled"></i> Pending
                                                </span>

                                            @elseif($item->status == 'resolved')
                                                <span class="badge bg-success py-2 px-3">
                                                    <i class="ti ti-point-filled"></i> Resolved
                                                </span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <div class="action-icon d-inline-flex">
                                                <a href="javascript:void(0);" class="me-2 deleteBtn" data-bs-toggle="modal"
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


    <!-- Sucess Modal -->
    <div class="modal fade" id="success_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="avatar avatar-xl bg-transparent-success text-success mb-3">
                        <i class="ti ti-circle-check fs-36"></i>
                    </span>
                    <h4 class="mb-1">Success!</h4>
                    <p class="mb-3 success-message"></p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-success" data-bs-dismiss="modal">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Success Modal -->

@endsection

@push('scripts')
    <script>
        

    </script>
@endpush
