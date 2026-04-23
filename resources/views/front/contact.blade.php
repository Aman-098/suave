@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Contact Us</h1>

                <!-- <ul class="breadcrum">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">About us</a></li>
                            </ul> -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="widget-contact-us">
        <div class="themesflat-container">
            <div class="contact-us">
                <div class="row mb-60">
                    <div class="col-md-12 col-lg-4">
                        <div class="contact-us-box">
                            <div class="icon">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="#fff"
                                        d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011-.24c1.12.37 2.33.57 3.59.57a1 1 0 011 1V21a1 1 0 01-1 1C10.3 22 2 13.7 2 3a1 1 0 011-1h3.5a1 1 0 011 1c0 1.26.2 2.47.57 3.59a1 1 0 01-.25 1l-2.2 2.2z" />
                                </svg>
                            </div>
                            <div class="title">Call</div>
                            <p class="des">+44 0808 168 0808</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="contact-us-box">
                            <div class="icon">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="#fff"
                                        d="M20 4H4a2 2 0 0 0-2 2v1.5l10 6.25L22 7.5V6a2 2 0 0 0-2-2zm2 5.75-9.4 5.88a1 1 0 0 1-1.2 0L2 9.75V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9.75z" />
                                </svg>
                            </div>
                            <div class="title">Email</div>
                            <p class="des">info@suaveexecutivetravel.co.uk</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="contact-us-box">
                            <div class="icon">
                                <svg width="50" height="50" viewBox="0 0 73 73" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1825_4185)">
                                        <path
                                            d="M36.8497 6.25297C36.0707 6.24737 35.4354 6.87037 35.4297 7.64318C35.4241 8.41599 36.0495 9.04739 36.8286 9.05299C37.6061 9.05859 38.2415 8.43699 38.2471 7.66418C38.2527 6.89137 37.6273 6.25997 36.8497 6.25297Z"
                                            fill="#fff" />
                                        <path
                                            d="M36.7787 14.6526C31.3396 14.6142 26.8852 18.9751 26.844 24.3791C26.803 29.7827 31.1934 34.2118 36.6308 34.2525C36.656 34.2526 36.681 34.2528 36.7063 34.2528C42.109 34.2528 46.5245 29.9049 46.5654 24.5261C46.6064 19.1227 42.2162 14.6933 36.7787 14.6526ZM36.706 31.4529C36.6882 31.4529 36.6696 31.4528 36.6519 31.4526C32.768 31.4235 29.632 28.2597 29.6613 24.4001C29.6904 20.5577 32.8442 17.4522 36.7034 17.4522C36.7212 17.4522 36.7398 17.4523 36.7575 17.4525C40.6414 17.4816 43.7775 20.6454 43.7482 24.5051C43.7189 28.3474 40.5652 31.4529 36.706 31.4529Z"
                                            fill="#fff" />
                                        <path
                                            d="M42.8524 7.31525C42.1196 7.0568 41.314 7.43831 41.054 8.16716C40.7941 8.896 41.1779 9.69611 41.9111 9.95455C48.116 12.1401 52.2512 18.0133 52.2016 24.5692C52.1958 25.3422 52.8217 25.9738 53.5997 25.9797C53.6033 25.9797 53.6069 25.9797 53.6106 25.9797C54.3834 25.9797 55.0131 25.3597 55.019 24.5902C55.0776 16.8415 50.1882 9.89925 42.8524 7.31525Z"
                                            fill="#fff" />
                                        <path
                                            d="M45.3493 53.3547C54.7189 41.3685 60.5744 35.1182 60.6535 24.6315C60.7526 11.4374 49.9787 0.652344 36.7038 0.652344C23.5838 0.652344 12.8584 11.2124 12.7586 24.2745C12.678 35.0455 18.6423 41.2873 28.0766 53.3528C18.6912 54.7466 12.7586 58.249 12.7586 62.533C12.7586 65.4026 15.4275 67.9776 20.2738 69.7836C24.6849 71.4275 30.5206 72.3329 36.706 72.3329C42.8915 72.3329 48.7272 71.4275 53.1383 69.7836C57.9846 67.9775 60.6535 65.4024 60.6535 62.5328C60.6535 58.2513 54.7264 54.7497 45.3493 53.3547ZM15.5759 24.2956C15.6638 12.7695 25.1266 3.45237 36.7041 3.45237C48.4186 3.45237 57.9236 12.9708 57.8362 24.6106C57.7613 34.5695 51.5515 40.7067 41.6376 53.5509C39.8693 55.8407 38.2453 58.0057 36.7082 60.1235C35.1755 58.0045 33.584 55.8783 31.7892 53.55C21.4654 40.1682 15.4995 34.4947 15.5759 24.2956ZM36.706 69.533C24.6123 69.533 15.5759 65.8374 15.5759 62.533C15.5759 60.0824 20.9779 56.9867 30.0608 55.9147C32.0686 58.5328 33.8289 60.9115 35.5554 63.3408C35.8191 63.7118 36.2477 63.9327 36.7048 63.933C36.7052 63.933 36.7056 63.933 36.706 63.933C37.1627 63.933 37.5911 63.7129 37.8553 63.3426C39.5654 60.9449 41.3739 58.5076 43.3645 55.9162C52.439 56.9893 57.8362 60.084 57.8362 62.5331C57.8361 65.8374 48.7998 69.533 36.706 69.533Z"
                                            fill="#fff" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1825_4185">
                                            <rect width="72.1247" height="71.6806" fill="white"
                                                transform="translate(0.644531 0.652344)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="title">Address</div>
                            <p class="des">UK</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-60">
                    <div class="col-md-8 col-lg-8">
                        <div class="form-contact-us-page">
                            <h2>Contact us</h2>
                            <form action="#" id="form-contact-us-page">
                                <div class="input-contact-us-wrap">
                                    <fieldset class="input-contact-us">
                                        <input aria-required="true" aria-invalid="false" placeholder="Enter your name"
                                            value="" type="text">
                                    </fieldset>

                                    <fieldset class="input-contact-us">
                                        <input aria-required="true" aria-invalid="false" placeholder="Enter Phone Number"
                                            value="" type="tel">
                                    </fieldset>
                                    <fieldset class="input-contact-us">
                                        <input aria-required="true" aria-invalid="false" placeholder="Enter Email Address"
                                            value="" type="email">
                                    </fieldset>
                                </div>
                                <textarea cols="40" rows="10" aria-invalid="false">Write Message.....</textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9478108.126193948!2d-4.4737716!3d54.55127985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1775622830947!5m2!1sen!2sin"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
