<footer class="ul-footer">
    <div class="ul-inner-container">
        <div class="ul-footer-top">
            <div class="ul-footer-top-widget">
                <h3 class="ul-footer-top-widget-title">Quick Links</h3>
                <div class="ul-footer-top-widget-links">
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('payment') }}">Payment & Security</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a>
                    </ul>
                </div>
            </div>
            <div class="ul-footer-top-widget">
                <h3 class="ul-footer-top-widget-title">Quick Links</h3>
                <div class="ul-footer-top-widget-links">
                    <ul>
                        <li><a href="blogs.html">Blog</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('delivery') }}">Delivery & Returns</a></li>
                        <li><a href="{{ route('cookie') }}">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="ul-footer-top-widget">
                <h3 class="ul-footer-top-widget-title">Category</h3>
                <div class="ul-footer-top-widget-links">
                    <ul>
                        @foreach ($header_categories as $item)
                            <li>
                                <a href="{{ url('category/' . $item->slug) }}">{{ strtoupper($item->name) }}</a>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
        <div class="ul-footer-middle">
            <div class="ul-footer-middle-widget">
                <h3 class="ul-footer-middle-widget-title">Get free shipping</h3>
                <div class="ul-footer-middle-widget-content free-shipping-mmg">
                    <img src="assets_front/img/final-image.png" alt="">
                </div>
            </div>
            <div class="ul-footer-middle-widget">
                <h3 class="ul-footer-middle-widget-title">Follow us</h3>
                <div class="ul-footer-middle-widget-content">
                    <div class="social-links">
                        <a href="https://www.facebook.com/ravairLimited/" target="_blank"><i
                                class="flaticon-facebook-app-symbol"></i></a>
                        <a href="https://twitter.com/limitedravair" target="_blank"><i class="flaticon-twitter"></i></a>
                        <a href="https://uk.linkedin.com/in/ray-vidler-b3034b1ba" target="_blank"><i
                                class="flaticon-linkedin-big-logo"></i></a>
                        <a href="https://www.youtube.com/channel/UCXzXmhwvryIjo52bcKcoPWw" target="_blank"><i
                                class="flaticon-youtube"></i></a>
                        <a href="https://www.instagram.com/ravairlimited/?hl=en" target="_blank"><i
                                class="flaticon-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="ul-footer-middle-widget">
                <h3 class="ul-footer-middle-widget-title">Call us</h3>
                <div class="ul-footer-middle-widget-content">
                    <div class="contact-nums">
                        <a href="tel:1234567890">+01892 750777</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ul-footer-bottom">
            <p class="copyright-txt">
                © 2024 <a href="{{ route('home') }}">ravair.co.uk</a>. All Rights Reserved | Powered by
                <a href="https://qorvatech.com/" target="_blank">Qorvatech</a>
            </p>
            <img src="{{ asset('img/images/payment_method_img.png') }}" alt="payment methods logos">
        </div>
    </div>
</footer>




<script src="{{ asset('js/vendor/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/splide/splide.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/splide/splide-extension-auto-scroll.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>


<script src="{{ asset('assets_front/vendor/animate-wow/wow.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/splittype/index.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/mixitup/mixitup.min.js') }}"></script>
<script src="{{ asset('assets_front/vendor/fslightbox/fslightbox.js') }}"></script>
<!-- <script src="assets/vendor/no-ui-slider/nouislider.min.js"></script> -->
<script src="{{ asset('assets_front/js/main.js') }}"></script>
<!-- <script src="https://ravairsolar.com/assets/js/countdown.js"></script> -->

<script src="{{ asset('assets_front/vendor/slim-select/slimselect.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<!-- ElevateZoom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>


<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
    const notyf = new Notyf({
        position: {
            x: 'right', // left / center / right
            y: 'top' // top / bottom
        }
    });
</script>


<script>
    $('.slider').slick({
        dots: true, // Show dots navigation
        infinite: true, // Infinite loop
        speed: 500, // Slide transition speed
        slidesToShow: 1, // Show one slide at a time
        slidesToScroll: 1, // Scroll one slide at a time
        autoplay: true, // Enable autoplay
        autoplaySpeed: 3000, // Slide every 3 seconds
        arrows: true, // Show next/prev arrows
        adaptiveHeight: true, // Adjust height dynamically
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize ElevateZoom
        $("#mainImage").elevateZoom({
            zoomType: "lens",
            lensShape: "round",
            lensSize: 150
        });

        // Thumbnail Click Event
        $(".thumb img").click(function() {
            var newImage = $(this).attr("data-image");
            var newZoomImage = $(this).attr("data-zoom-image");

            $("#mainImage").attr("src", newImage).attr("data-zoom-image", newZoomImage);

            // Reinitialize ElevateZoom
            $(".zoomContainer").remove();
            $("#mainImage").elevateZoom({
                zoomType: "lens",
                lensShape: "round",
                lensSize: 150
            });

            // Active Class for Selected Thumbnail
            $(".thumb img").removeClass("active");
            $(this).addClass("active");
        });

        // Initialize Slick Slider for Thumbnails
        $('.thumbnail-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-arrow-point-to-right"></i></button>',
            dots: false,
            infinite: false
        });
    });
</script>



@stack('scripts')

</body>

</html>
