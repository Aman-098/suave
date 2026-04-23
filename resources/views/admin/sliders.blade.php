@extends('admin.common.layout')

@section('title', 'Manage Sliders')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Manage Sliders</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Dashboard /
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Sliders </li>
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
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_cat"
                            class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                            Slider</a>
                    </div>
                    {{-- <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /Breadcrumb -->

            <div class="row">

                <!-- Total Category -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-primary flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Total Sliders</p>
                                    <h4>{{ $total_slider ?? 0 }}</h4>

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
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Active Sliders</p>
                                    <h4>{{ $active_slider ?? 0 }}</h4>
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
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Inactive Sliders</p>
                                    <h4>{{ $inactive_slider ?? 0 }}</h4>
                                </div>
                            </div>
                            <div id="inactive-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Inactive Category -->
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Sliders List</h5>

                </div>
                <div class="card-body p-0">
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                                <tr>

                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $index => $item)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="width:60px; height:60px; object-fit:cover;"
                                                class="img-fluid rounded">
                                        </td>

                                        <td>{{ ucfirst($item->title) }}</td>
                                        <td>{{ ucfirst($item->description) }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                                                    <i class="ti ti-point-filled me-1"></i>Inactive
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="action-icon d-inline-flex">

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

    <!-- Add slider -->
    <div class="modal fade" id="add_cat">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Slider</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="#" id="add_cat_from" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Image <span class="text-danger"> *</span></label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    <span id="imageError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title <span class="text-danger"> *</span></label>
                                    <input type="text" id="title" name="title" class="form-control">
                                    <span id="titleError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description <span class="text-danger"> *</span></label>
                                    <input type="text" id="description" name="description" class="form-control">
                                    <span id="descriptionError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status<span class="text-danger"> *</span></label>
                                    <select class="select" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add slider -->

    <!-- Edit slider -->
    <div class="modal fade" id="edit_cat">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Slider</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="#" id="edit_cat_from" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <input type="hidden" name="edit_id" id="edit_id" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Image <span class="text-danger"> *</span></label>
                                    <input type="file" id="edit_image" name="image" class="form-control">
                                    <!-- image preview -->
                                    <img id="edit_image_preview" src=""
                                        style="max-width:150px; margin-top:10px; display:none;" class="img-thumbnail">
                                    <span id="edit_imageError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title<span class="text-danger"> *</span></label>
                                    <input type="text" id="edit_title" name="title" class="form-control">
                                    <span id="edit_titleError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description<span class="text-danger"> *</span></label>
                                    <input type="text" id="edit_description" name="description" class="form-control">
                                    <span id="edit_descriptionError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status<span class="text-danger"> *</span></label>
                                    <select class="select" name="status" id="edit_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
    <!-- /Edit slider -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                        <i class="ti ti-trash-x fs-36"></i>
                    </span>
                    <h4 class="mb-1">Confirm Delete</h4>
                    <p class="mb-3">You want to delete the item, this cant be undone once you delete.</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" id="confirmDelete" class="btn btn-danger">Yes,
                            Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->

@endsection

@push('scripts')
    <script>
        // Function to show validation error under input
        function showError(element, message) {
            $(element).text(message).show();
            setTimeout(() => {
                $(element).fadeOut();
            }, 4000);
        }

        $(document).ready(function() {

            // Handle add form submit
            $('#add_cat_from').submit(function(e) {
                e.preventDefault();

                // Collect form values
                var title = $('#title').val().trim();
                var image = $('#image')[0].files[0];

                // Validation
                if (!image) {
                    showError('#imageError', 'Image is Required.');
                    return false
                }

                if (title === '') return showError('#titleError', 'Title is required.');




                // Prepare FormData
                var formData = new FormData(this);

                // CSRF setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                // AJAX request
                $.ajax({
                    url: "{{ route('admin.slider-add') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === true) {
                            toastr.success(response.message);
                            $('#add_cat_from')[0].reset();
                            $('#add_cat').modal('hide');
                            setTimeout(() => {
                                window.location.href =
                                    "{{ route('admin.sliders') }}";
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

            // Handle edit form
            $('#edit_cat_from').submit(function(e) {
                e.preventDefault();

                var edit_id = $('#edit_id').val();

                // Collect form values
                var title = $('#edit_title').val().trim();

                // Validation


                if (title === '') return showError('#edit_titleError', 'Title is required.');

                var formData = new FormData(this);

                // CSRF setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url = "{{ route('edit.slider', ':id') }}";
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
                                    "{{ route('admin.sliders') }}";
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
            let url = "{{ route('edit.slider', ':id') }}";
            url = url.replace(':id', userId);

            $.ajax({
                url: url,
                type: "GET",
                success: function(res) {
                    let data = res.slider;

                    $('#edit_id').val(data.id);
                    // image preview
                    if (data.image) {
                        $('#edit_image_preview')
                            .attr('src', '/storage/' + data.image)
                            .show();
                    } else {
                        $('#edit_image_preview').hide();
                    }
                    $('#edit_title').val(data.title ?? '');
                    $('#edit_description').val(data.description ?? '');
                    $('#edit_status').val(data.status).trigger('change');
                },
                error: function(err) {
                    // console.error(err);
                    toastr.error('Failed to fetch slider data');
                }
            });
        });

        // delete category
        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).data('id');
            // console.log(id);
            $('#delete_modal').data('id', id);
        });

        $(document).on('click', '#confirmDelete', function() {
            let deleteId = $('#delete_modal').data('id');
            if (!deleteId) {
                toastr.error('No record selected');
                return;
            }

            // ✅ Fix: generate correct URL
            let url = `/delete-slider/${deleteId}`;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}" // important for Laravel
                },
                success: function(response) {
                    if (response.status == true) {
                        $('#delete_modal').modal('hide');
                        $(`[data-id="${deleteId}"]`).closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        });

                        setTimeout(() => {
                            window.location.href =
                                "{{ route('admin.sliders') }}";
                        }, 2000);
                    }

                },
                error: function(err) {
                    $('#delete_modal').modal('hide');
                    toastr.error('Failed to delete slider');
                    // console.error(err);
                }

            });

        });
    </script>
@endpush
