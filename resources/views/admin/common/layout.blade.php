<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Ravair Solar">
    <meta name="keywords" content="Ravair Solar">
    <meta name="author" content="Ravair Solar">
    @env('staging')
        <meta name="robots" content="noindex, nofollow">
    @endenv

    @env('production')
        <meta name="robots" content="index, follow">
    @endenv
    
    <title>@yield('title', 'Admin')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Theme Script JS -->
    {{-- <script src="{{ asset('assets/js/theme-script.js') }}"></script> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Color Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">

    <style>
        #qaSection .row {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
        }

        #qaSection strong {
            font-weight: 600;
            color: #333;
        }
    </style>


</head>


<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        @yield('content')

    </div>
    <!-- /Main Wrapper -->


    @include('admin.partials.footer')
