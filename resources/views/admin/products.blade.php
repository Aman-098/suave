@extends('admin.common.layout')

@section('title', 'Manage Products')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Manage Fleets</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Dashboard /
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Fleets </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_cat"
                            class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                            Fleet</a>
                    </div>

                </div>
            </div>
            <!-- /Breadcrumb -->

            <div class="row">

                <!-- Total Products -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-primary flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Total Fleet</p>
                                    <h4>{{ $total_product ?? 0 }}</h4>

                                </div>
                            </div>
                            <div id="total-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Total Products -->

                <!-- Active Products -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-success flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Active Fleet</p>
                                    <h4>{{ $active_product ?? 0 }}</h4>
                                </div>
                            </div>
                            <div id="active-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Active Products -->

                <!-- Inactive Products -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar avatar-lg bg-danger flex-shrink-0">
                                    <i class="ti ti-building fs-16"></i>
                                </span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Inactive Fleet</p>
                                    <h4>{{ $inactive_product ?? 0 }}</h4>
                                </div>
                            </div>
                            <div id="inactive-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- /Inactive Products -->
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Products List</h5>

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
                                    <th>Price</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $item)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="width:60px; height:60px; object-fit:cover;"
                                                class="img-fluid rounded">
                                        </td>

                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>{{ \Illuminate\Support\Str::words(strip_tags($item->description), 10, '...') }}
                                        </td>
                                        <td>{{ $item->price }}</td>

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

    <!-- Add product -->
    <div class="modal fade" id="add_cat">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Fleet</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="#" id="add_cat_from" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category<span class="text-danger"> *</span></label>
                                    <select class="select" name="category_id" class="form-control">
                                        <option value="">-- Category --</option>

                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name <span class="text-danger"> *</span></label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    <input type="text" id="rating" name="rating" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price <span class="text-danger"> *</span></label>
                                    <input type="text" id="price" name="price" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description<span class="text-danger"> *</span></label>
                                    <div id="content"></div>
                                    <span class="text-danger" id="descError"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Specifications<span class="text-danger"> *</span></label>
                                    <div id="specification"></div>
                                    <span class="text-danger" id="edit_specError"></span>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Image<span class="text-danger"> *</span></label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    <span id="imageError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Video </label>
                                    <input type="file" id="edit_video" name="video" class="form-control">
                                    <video id="edit_video_preview" style="max-width:150px; margin-top:10px; display:none;"
                                        class="img-thumbnail" controls>
                                    </video>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">

                                    <label class="form-label">Gallery Image</label>
                                    <input type="file" id="gallery_image" name="gallery_image[]" class="form-control"
                                        multiple>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Badge</label>
                                    <input type="text" id="badge" name="badge"
                                        placeholder="e.g. Limited Availability" class="form-control">
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
                        <button type="submit" id="submitBtn" class="btn btn-primary">Add Fleet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add product -->

    <!-- Edit product -->
    <div class="modal fade" id="edit_cat">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Fleet</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="#" id="edit_cat_from" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <input type="hidden" name="edit_id" id="edit_id" value="">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category<span class="text-danger"> *</span></label>
                                    <select class="select" name="category_id" id="edit_category_id"
                                        class="form-control">
                                        <option value="">-- Category --</option>

                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name <span class="text-danger"> *</span></label>
                                    <input type="text" id="edit_name" name="name" class="form-control">
                                    <span id="edit_nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    <input type="text" id="edit_rating" name="rating" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price <span class="text-danger"> *</span></label>
                                    <input type="text" id="edit_price" name="price" class="form-control">
                                    <span id="edit_priceError" class="text-danger"></span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description<span class="text-danger"> *</span></label>
                                    <div id="edit_content"></div>
                                    <span class="text-danger" id="edit_descError"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Specifications<span class="text-danger"> *</span></label>
                                    <div id="edit_specification"></div>
                                    <span class="text-danger" id="edit_specError"></span>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Image<span class="text-danger"> *</span></label>
                                    <input type="file" id="edit_image" name="image" class="form-control">
                                    <!-- image preview -->
                                    <img id="edit_image_preview1" src=""
                                        style="max-width:150px; margin-top:10px; display:none;" class="img-thumbnail">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Video </label>
                                    <input type="file" id="edit_video" name="video" class="form-control">
                                    <video id="edit_video_preview" style="max-width:150px; margin-top:10px; display:none;"
                                        class="img-thumbnail" controls>
                                    </video>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Gallery Image<span class="text-danger"> *</span></label>
                                    <input type="file" id="gallery_image" name="gallery_image[]" class="form-control"
                                        multiple>

                                    {{-- gallery image preview --}}
                                    <div id="edit_gallery_preview" style="margin-top:10px; display:none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Badge</label>
                                    <input type="text" id="edit_badge" name="badge" class="form-control">
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
                        <button type="submit" id="updateBtn" class="btn btn-primary">Update Fleet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit product -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                        <i class="ti ti-trash-x fs-36"></i>
                    </span>
                    <h4 class="mb-1">Confirm Delete</h4>
                    <p class="mb-3">You want to delete this items, this cant be undone once you delete.</p>
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
    {{-- summernote script  --}}
    <script>
        $('#content,#edit_content,#specification,#edit_specification').summernote({
            placeholder: 'Write description...',
            tabsize: 2,
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],

            styleTags: [
                'p',
                'h1',
                'h2',
                'h3',
                'h4',
                'h5',
                'h6',
                'blockquote',
                'pre'
            ],

            callbacks: {
                onPaste: function(e) {
                    e.preventDefault();

                    let clipboardData = (e.originalEvent || e).clipboardData;
                    let text = clipboardData.getData('text/plain');

                    document.execCommand('insertText', false, text);
                }
            }
        });
    </script>

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

                // Clear previous errors
                $('#nameError').text('');

                // Collect form values
                var name = $('#name').val().trim();

                var price = $('#price').val().trim();
                var content = $('#content').summernote('code');
                var specification = $('#specification').summernote('code');



                // Validation

                if (name === '') return showError('#nameError', 'Name is required.');

                if (price === '') return showError('#priceError', 'Price is required.');

                // Validate content (tinyMCE)
                if (content === '') {
                    showError("#descError", "Content is required");
                    return false;
                }

                // button processing
                $('#submitBtn')
                    .prop('disabled', true)
                    .html('Please wait...');

                // Prepare FormData
                var formData = new FormData(this);
                formData.append('content', content);
                formData.append('specification', specification);

                // CSRF setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                // AJAX request
                $.ajax({
                    url: "{{ route('admin.product-add') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // restore button
                        $('#submitBtn')
                            .prop('disabled', false)
                            .html('Add Fleet');
                        if (response.status === true) {
                            toastr.success(response.message);
                            $('#add_cat_from')[0].reset();
                            $('#add_cat').modal('hide');
                            setTimeout(() => {
                                window.location.href =
                                    "{{ route('admin.product') }}";
                            }, 2000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        $('#submitBtn')
                            .prop('disabled', false)
                            .html('Add Fleet');
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
                var content = $('#edit_content').summernote('code');
                var specification = $('#edit_specification').summernote('code');

                // Collect form values
                var name = $('#edit_name').val().trim();
                var price = $('#edit_price').val().trim();
                // var content = $('#edit_content').summernote('code');



                // Validation

                if (name === '') return showError('#edit_nameError', 'Name is required.');

                if (price === '') return showError('#edit_priceError', 'Price is required.');

                // Validate content (tinyMCE)
                if (content === '') {
                    showError("#edit_descError", "Content is required");
                    return false;
                }

                // before ajax
                $('#updateBtn')
                    .prop('disabled', true)
                    .html('Please wait...');

                // Prepare FormData
                var formData = new FormData(this);
                formData.append('content', content);
                formData.append('specification', specification);


                // CSRF setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url = "{{ route('edit.product', ':id') }}";
                url = url.replace(':id', edit_id);

                // AJAX request
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#updateBtn')
                            .prop('disabled', false)
                            .html('Update Fleet');
                        if (response.status === true) {
                            toastr.success(response.message);
                            $('#edit_cat').modal('hide');
                            setTimeout(() => {
                                window.location.href =
                                    "{{ route('admin.product') }}";
                            }, 2000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        $('#updateBtn')
                            .prop('disabled', false)
                            .html('Update Fleet');
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
            let url = "{{ route('edit.product', ':id') }}";
            url = url.replace(':id', userId);

            $.ajax({
                url: url,
                type: "GET",
                success: function(res) {
                    let data = res.product;

                    $('#edit_id').val(data.id);
                    $('#edit_category_id').val(data.category_id).trigger('change');
                    $('#edit_name').val(data.name ?? '');

                    $('#edit_rating').val(data.rating ?? '');

                    $('#edit_price').val(data.price ?? '');

                    // Set Summernote content here
                    $('#edit_content').summernote('code', data.description ?? '');
                    $('#edit_specification').summernote('code', data.specification ?? '');

                    // image preview
                    if (data.image) {
                        $('#edit_image_preview1')
                            .attr('src', '/storage/' + data.image)
                            .show();
                    } else {
                        $('#edit_image_preview1').hide();
                    }

                    if (data.gallery_images && data.gallery_images.length > 0) {
                        let html = '';

                        data.gallery_images.forEach(function(image) {
                            html += `<img src="/storage/${image}" 
                style="width:100px; height:100px; margin:5px; border-radius:5px;">`;
                        });

                        $('#edit_gallery_preview').html(html).show();
                    } else {
                        $('#edit_gallery_preview').html('').hide();
                    }

                    $('#edit_badge').val(data.badge ?? '');

                    $('#edit_status').val(data.status).trigger('change');
                },
                error: function(err) {
                    // console.error(err);
                    toastr.error('Failed to fetch fleet data');
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
            let url = `/delete-fleet/${deleteId}`;

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
                                "{{ route('admin.product') }}";
                        }, 2000);
                    }

                },
                error: function(err) {
                    $('#delete_modal').modal('hide');
                    toastr.error('Failed to delete product');
                    // console.error(err);
                }

            });

        });
    </script>
@endpush
