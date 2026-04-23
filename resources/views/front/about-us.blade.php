@extends('front.common.layout')

@section('title', 'About Us')

@section('meta_description',
    'solar')

@section('meta_keywords', 'solar')


@section('content')
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">About Us</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">About Us</span>
                </div>
            </div>
        </div>

        <div class="ul-inner-page-container">
            <section class="ul-about">
                <div class="row">
                    <div class="col">
                        <div class="ul-about-txt">
                            <p>
                            <p>Ravair Limited is a UK based company launched in 2015 to revolutionise the way we think about
                                our health and it&#39;s relationship with clean air. The Ravair Team have worked tirelessly
                                to design Mobile Extraction Units that not only look good, but REALLY WORK. There are
                                thousands of different air purifiers and nail dust extractors on the market and whilst most
                                don&#39;t work at all and some work to an extent, none work in the way the Ravair Extractors
                                work. The Activated Carbon in Ravair Units is expensive and made exclusively in the USA and
                                not a cheap version from Asia!</p>
                            <p>Ravair&#39;s vision was to source the best components to create mobile extraction unit&#39;s
                                that are quite, cost effective, easily moved around the home or work space and most
                                importantly do not sell due to fantastic marketing but because they really do work.</p>
                            <p>Ravair Limited&#39;s Mission Statement is to not only make everyone aware of the dangers of
                                breathing contaminated or polluted air but to provide easy and relatively inexpensive
                                answers. It is all very well for governments, scientists and journalists around the world
                                telling us about global warming and the danger to health from polluted air. Not just to
                                humans but our animals as well- do they provide the solutions? The answer to that is
                                obviously a big NO and although our mobile extraction units will not solve the entire
                                problem they WILL solve the problem in your home, nail/beauty salon, care or pet home
                                GUARANTEED.</p>
                            <p>The list of applications for these units is endless, if you have a specific smell or fumes
                                that you want to totally eliminate then call our experts. Details on the homepage. We will
                                give you free, genuine advice. We won&#39;t just sell you a machine if we don&#39;t know for
                                sure that it will work for you.</p>
                            <p>Everyone deserves and needs clean air. Remember asbestos wasn&#39;t discovered until over 20
                                years after the event!</p>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>


@endsection
