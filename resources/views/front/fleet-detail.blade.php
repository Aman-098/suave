@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">
                <h1 class="main-title">Our Fleet</h1>
                <!-- <ul class="breadcrum">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="#">About us</a></li>
                                        </ul> -->
            </div>
        </div>
    </div>


    <section class="car-product detail-listing">

        <div class="container">

            <div class="product-grid">
                @php
                    $gallery = is_array($fleet->gallery_images)
                        ? $fleet->gallery_images
                        : json_decode($fleet->gallery_images, true);
                @endphp

                <!-- LEFT: IMAGE GALLERY -->
                {{-- <div class="product-gallery">
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $fleet->image) }}" id="mainCarImg">
                    </div>

                    <div class="thumb-wrapper">

                        <button class="thumb-btn prev" onclick="scrollThumbs(-1)">‹</button>

                        <div class="thumbs" id="thumbSlider">
                            <img src="assets/img/car1.jpg" onclick="changeImg(this)">
                            <img src="assets/img/car2.jpg" onclick="changeImg(this)">
                            <img src="assets/img/car3.jpg" onclick="changeImg(this)">
                            <img src="assets/img/car1.jpg" onclick="changeImg(this)">
                            <img src="assets/img/car2.jpg" onclick="changeImg(this)">
                            <img src="assets/img/car1.jpg" onclick="changeImg(this)">
                        </div>

                        <button class="thumb-btn next" onclick="scrollThumbs(1)">›</button>

                    </div>
                </div> --}}

                <div class="product-gallery">
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $fleet->image) }}" id="mainCarImg">
                    </div>

                    <div class="thumb-wrapper">

                        <button class="thumb-btn prev" onclick="scrollThumbs(-1)">‹</button>

                        <div class="thumbs" id="thumbSlider">
                            @if (!empty($gallery))
                                @foreach ($gallery as $img)
                                    <img src="{{ asset('storage/' . $img) }}" onclick="changeImg(this)">
                                @endforeach
                            @endif
                        </div>

                        <button class="thumb-btn next" onclick="scrollThumbs(1)">›</button>

                    </div>
                </div>

                <!-- RIGHT: PRODUCT INFO -->
                <div class="product-info">

                    <h1>{{ $fleet->name }}</h1>

                    @php
                        $rating = $fleet->rating;
                    @endphp

                    @if (isset($rating) && $rating != null)
                        <div class="rating">
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $rating ? 'filled' : '' }}"></span>
                                @endfor
                            </div>
                            <span class="rating-text">{{ $rating }} • Premium Experience</span>
                        </div>
                    @endif

                    <div class="price">
                        {{-- <span class="day">₹ 4,320 / Day</span> --}}
                        <span class="hour">₤ {{ number_format($fleet->price, 2) }} / Hour</span>
                    </div>


                    <p class="desc">
                        {!! $fleet->description !!}
                    </p>

                    {{-- <!-- FEATURES -->
                    <ul class="highlights">
                        <li>✔ Chauffeur Included</li>
                        <li>✔ Premium Leather Interior</li>
                        <li>✔ Starlight Ceiling</li>
                        <li>✔ Smooth Silent Drive</li>
                    </ul> --}}

                    <!-- ACTION -->
                    <div class="actions">
                        <a href="#" class="btn primary">Book Now</a>
                        <a href="https://wa.me/919988998899" class="btn whatsapp"><i class="icon-whatsapp-1"></i></a>
                        <a href="tel:+919988998899" class="btn outline">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff">
                                <path
                                    d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <!-- <div class="extra">
                      <p>✔ Instant Confirmation</p>
                      <p>✔ Free Cancellation (24 hrs)</p>
                    </div> -->

                </div>

            </div>

            <!-- TABS -->
            <div class="detail-listing">
                <div class="product-tabs">

                    <div class="tabs">
                        <button class="tab-btn active" data-tab="desc">Description</button>
                        <button class="tab-btn" data-tab="specs">Specifications</button>
                        {{-- <button class="tab-btn" data-tab="reviews">Reviews</button> --}}
                    </div>

                    <div id="desc" class="tab-content active">
                        {!! $fleet->description !!}


                    </div>

                    <div id="specs" class="tab-content">
                        {!! $fleet->specification !!}

                    </div>

                    {{-- <div id="reviews" class="tab-content">
                        <div class="review">
                            <p class="review-text">
                                The car was spotless, the driver was highly professional,
                                and the ride quality was beyond expectations. Perfect for my wedding entry.”
                            </p>
                            <span class="review-user">— Rahul Sharma</span>
                        </div>

                        <div class="review">
                            <p class="review-text">
                                “Booked for a corporate guest. The impression it created was outstanding.
                                Smooth booking process and on-time service. Highly recommended!”
                            </p>
                            <span class="review-user">— Neha Verma</span>
                        </div>

                        <div class="review">
                            <p class="review-text">
                                “Luxury at its best. The interior ambience and comfort level is next level.
                                Worth every rupee for special occasions.”
                            </p>
                            <span class="review-user">— Aman Gupta</span>
                        </div>
                    </div> --}}

                </div>
            </div>

        </div>

    </section>


    <section class="listing-pro">
        <div class="overlay"></div>

        <div class="container">

            <!-- Top Content -->
            <div class="top-content">
                <div class="left">
                    <span class="small-title">Want Something Else?</span>
                    <p>
                        Discover more luxury cars available to hire in London with Suave Executive Travel.
                        From supercars to premium SUVs, our fleet is perfect for weddings,
                        business trips, airport transfers, photo shoots and weekend drives.
                    </p>
                    <a href="{{ route('fleets') }}" class="btn">Explore Our Fleet</a>
                </div>

                <div class="right">
                    <h2>Explore More of Our<br>Luxury Fleet</h2>
                </div>
            </div>

            <!-- Cards -->
            @if (count($related_fleet) > 0)
                <div class="car-grid">

                    @foreach ($related_fleet as $fleet)
                        <div class="car-card">
                            <img src="{{ asset('storage/' . $item->image) }}" />
                            <div class="card-overlay">
                                <span>{{ $item->catgegory->name }}</span>
                                <h3>{{ $item->name }}</h3>
                                <p>Price</p>
                                <h4>£ {{ number_format($item->price, 2) }} /day</h4>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="car-card">
                        <img src="https://images.unsplash.com/photo-1616788494707-ec28f08d05a1" />
                        <div class="card-overlay">
                            <span>Land Rover</span>
                            <h3>Range Rover SVR</h3>
                            <p>Price</p>
                            <h4>£300/day</h4>
                        </div>
                    </div>

                    <div class="car-card">
                        <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a" />
                        <div class="card-overlay">
                            <span>Ferrari</span>
                            <h3>488 GTB</h3>
                            <p>Price</p>
                            <h4>£1000/day</h4>
                        </div>
                    </div> --}}

                </div>
            @endif

        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function changeImg(el) {
            document.getElementById("mainCarImg").src = el.src;
        }
    </script>

    <script>
        $(document).ready(function() {
            const $track = $(".feedback-track");
            let $cards = $(".feedback-track .card");

            // ✅ Responsive visible count
            function getVisible() {
                if (window.innerWidth <= 576) return 1; // mobile
                if (window.innerWidth <= 992) return 2; // tablet
                return 3; // desktop
            }

            let visible = getVisible();
            let index = visible;

            function initSlider() {

                $track.css("transition", "none");

                $track.empty();
                $track.append($cards.clone());

                let allCards = $(".feedback-track .card");

                // Clone last items to start
                for (let i = allCards.length - visible; i < allCards.length; i++) {
                    $track.prepend(allCards.eq(i).clone());
                }

                // Clone first items to end
                allCards = $(".feedback-track .card");
                for (let i = 0; i < visible; i++) {
                    $track.append(allCards.eq(i).clone());
                }

                allCards = $(".feedback-track .card");

                let cardWidth = allCards.outerWidth(true);
                index = visible;

                $track.css("transform", "translateX(-" + (index * cardWidth) + "px)");

                // NEXT
                function nextSlide() {
                    index++;
                    $track.css({
                        "transition": "0.5s",
                        "transform": "translateX(-" + (index * cardWidth) + "px)"
                    });

                    if (index >= allCards.length - visible) {
                        setTimeout(function() {
                            $track.css("transition", "none");
                            index = visible;
                            $track.css("transform", "translateX(-" + (index * cardWidth) + "px)");
                        }, 500);
                    }
                }

                // PREV
                function prevSlide() {
                    index--;
                    $track.css({
                        "transition": "0.5s",
                        "transform": "translateX(-" + (index * cardWidth) + "px)"
                    });

                    if (index <= 0) {
                        setTimeout(function() {
                            $track.css("transition", "none");
                            index = allCards.length - (visible * 2);
                            $track.css("transform", "translateX(-" + (index * cardWidth) + "px)");
                        }, 500);
                    }
                }

                // Remove old events and rebind
                $(".next").off().on("click", nextSlide);
                $(".prev").off().on("click", prevSlide);

                // Auto slide
                clearInterval(window.autoSlide);
                window.autoSlide = setInterval(nextSlide, 3000);

                // Pause on hover
                $(".feedback-slider").off().hover(
                    function() {
                        clearInterval(window.autoSlide);
                    },
                    function() {
                        window.autoSlide = setInterval(nextSlide, 3000);
                    }
                );
            }

            // Init
            initSlider();
            // Resize handling
            $(window).resize(function() {
                let newVisible = getVisible();

                if (newVisible !== visible) {
                    visible = newVisible;
                    initSlider(); // reinitialize slider
                }
            });
        });
    </script>
    <script>
        document.querySelector(".close-video").onclick = function() {
            document.querySelector(".sticky-video").style.display = "none";
        }
    </script>
    <script>
        function openVideo() {
            document.getElementById("videoPopup").style.display = "flex";
            document.getElementById("videoFrame").src =
                "https://www.youtube.com/embed/c0C5Vl1CNQs?autoplay=1";
        }

        function closeVideo(e) {
            if (e) e.stopPropagation(); // prevent bubbling

            document.getElementById("videoPopup").style.display = "none";
            document.getElementById("videoFrame").src = "";
        }
        /* Close when clicking outside video */
        function outsideClick(e) {
            const content = document.querySelector(".video-content");
            if (!content.contains(e.target)) {
                closeVideo();
            }
        }
    </script>


    <script>
        document.getElementById('carSearch').addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            let cards = document.querySelectorAll('#carContainer .tf-car-service');

            cards.forEach(function(card) {
                let title = card.querySelector('.title').innerText.toLowerCase();

                if (title.includes(value)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>

    <script>
        const itemsPerPage = 6; // kitne cards per page
        const container = document.getElementById("carContainer");
        const items = Array.from(container.getElementsByClassName("tf-car-service"));
        const pagination = document.getElementById("pagination");

        let currentPage = 1;

        function showPage(page) {
            currentPage = page;

            let start = (page - 1) * itemsPerPage;
            let end = start + itemsPerPage;

            items.forEach((item, index) => {
                item.style.display = (index >= start && index < end) ? "block" : "none";
            });

            updatePagination();
        }

        function updatePagination() {
            const pageCount = Math.ceil(items.length / itemsPerPage);
            pagination.innerHTML = "";

            for (let i = 1; i <= pageCount; i++) {
                let btn = document.createElement("button");
                btn.innerText = i;

                if (i === currentPage) {
                    btn.classList.add("active");
                }

                btn.addEventListener("click", () => showPage(i));
                pagination.appendChild(btn);
            }
        }

        // INIT
        showPage(1);
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const tabs = document.querySelectorAll(".detail-listing .tab-btn");

            tabs.forEach(btn => {
                btn.addEventListener("click", function() {

                    const parent = this.closest(".product-tabs");

                    // remove active from buttons
                    parent.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));

                    // hide all content
                    parent.querySelectorAll(".tab-content").forEach(c => c.classList.remove(
                        "active"));

                    // activate clicked button
                    this.classList.add("active");

                    // show selected tab
                    const target = this.getAttribute("data-tab");
                    const content = parent.querySelector("#" + target);

                    if (content) {
                        content.classList.add("active");
                    }

                });
            });

        });
    </script>



    <script>
        function scrollThumbs(direction) {
            const slider = document.getElementById("thumbSlider");
            const scrollAmount = 100;

            slider.scrollBy({
                left: direction * scrollAmount,
                behavior: "smooth"
            });
        }
    </script>
@endpush
