@extends('front.common.layout')

@section('title', 'Thankyou | Ravair Solar')

@section('meta_description', 'thankyou')
<style>
    

    .thank-box {
        background: #fff;
        max-width: 600px;
        margin: auto;
    }

    .thank-box h2 {
        font-size: 32px;
    }
</style>

@section('content')

    {{-- <main>
         <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Thank You</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Thank You</span>
                </div>
            </div>
        </div>
    </main> --}}
    <!-- ================= THANK YOU SECTION ================= -->
    <section class="thank-you-section py-5 text-center">
        <div class="container">

            <div class="thank-box p-5 shadow rounded">

                <h2 class="fw-bold mb-3 text-success">Thank You! 🎉</h2>

                <p class="mb-4">
                    Your request has been successfully submitted.
                    Our team will get in touch with you shortly.
                </p>

                <a href="{{ route('home') }}" class="ul-cart-update-cart-btn">Back to Home</a>

            </div>

        </div>
    </section>



@endsection
