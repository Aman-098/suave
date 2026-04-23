@extends('front.common.layout')

@section('title', 'Payment & security')

@section('meta_description', 'Payment & security')

@section('meta_keywords', 'Payment & security')


@section('content')
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Payment & Security</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{route('home')}}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Payment & Security</span>
                </div>
            </div>
        </div>

        <div class="ul-inner-page-container">
            <section class="ul-about">
                <div class="row">
                    <div class="col">
                        <div class="ul-about-txt">
                            <p>
                            <h1>PAYMENT &amp; SECURITY</h1>
                            <p>&nbsp;</p>
                            <p><strong>Payment &amp; Security</strong></p>
                            <p>All payments made via our website, are processed securely by Paypal.&nbsp; Paypal are an
                                industry leader in website payment processing.</p>
                            <p>Ravair LTD does not receive, transfer or process any of your sensitive payment
                                information.<br />For information on PAYPAL&#39;s security policy please visit this
                                link&nbsp;https://www.paypal.com/uk/webapps/mpp/paypal-safety-and-security</p>
                            <p>As part of our security policy, we are committed to protecting your privacy and we will only
                                use the information that we collect about you lawfully and in accordance with the Data
                                Protection Act 1998.</p>
                            <p>At no time will our personal data or email details be given to third parties.</p>
                            <p>At all times during the checkout process, your personal information is encrypted, preventing
                                it from being seen by anyone other than yourself. This means that you can rest assured that
                                communications between your browser and this site&#39;s web servers are private and secure.
                            </p>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>


@endsection
