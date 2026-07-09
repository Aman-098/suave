@extends('front.common.layout')

@section('title', 'Thank You')

@section('meta_description', 'Thank you for contacting SUAVE Executive Travel.')

@section('meta_keywords', 'Thank You, Chauffeur Service, Executive Travel')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">
                <h1 class="main-title">Thank You</h1>
            </div>
        </div>
    </div>

    <div class="royal-ui">

        <section class="thank-you-section py-5">
            <div class="container">
                <div class="thank-you-card text-center">

                    <h2 class="text-white">Thank You for Your Enquiry!</h2>

                    <p class="lead text-white " style="margin-top: 20px;">
                        We appreciate you getting in touch with <strong>SUAVE Executive Travel</strong>.
                    </p>

                    <p class="text-white">
                        One of our specialists will
                        review your request and get back to you as soon as possible.
                    </p>

                    <div class="btn-read-more" style="margin-top: 20px">
                        <a class="more-link" href="{{ route('home') }}">
                            <span>Back to Home</span>
                            <i class="icon-arrow-right2"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>

    </div>

@endsection
