@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">
                <h1 class="main-title">Our Fleet</h1>
                
            </div>
        </div>
    </div>


    <section class="car-product detail-listing">

        <div class="container">

            <div class="product-grid">

                <!-- LEFT: IMAGE GALLERY -->
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="assets_front/img/car1.jpg" id="mainCarImg">
                    </div>

                    <div class="thumb-wrapper">

                        <button class="thumb-btn prev" onclick="scrollThumbs(-1)">‹</button>

                        <div class="thumbs" id="thumbSlider">
                            <img src="assets_front/img/car1.jpg" onclick="changeImg(this)">
                            <img src="assets_front/img/car2.jpg" onclick="changeImg(this)">
                            <img src="assets_front/img/car3.jpg" onclick="changeImg(this)">
                            <img src="assets_front/img/car1.jpg" onclick="changeImg(this)">
                            <img src="assets_front/img/car2.jpg" onclick="changeImg(this)">
                            <img src="assets_front/img/car1.jpg" onclick="changeImg(this)">
                        </div>

                        <button class="thumb-btn next" onclick="scrollThumbs(1)">›</button>

                    </div>
                </div>

                <!-- RIGHT: PRODUCT INFO -->
                <div class="product-info">

                    <h1>Rolls Royce Cullinan</h1>

                    <div class="rating">
                        <div class="stars">
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                            <span class="star filled"></span>
                            <span class="star"></span>
                        </div>
                        <span class="rating-text">4.0 • Premium Experience</span>
                    </div>

                    <div class="price">
                        <span class="day">₹ 4,320 / Day</span>
                        <span class="hour">₹ 1,500 / Hour</span>
                    </div>

                    <p class="desc">
                        Experience the ultimate luxury SUV crafted for elite travel.
                        Perfect for weddings, VIP movement, and unforgettable journeys.
                    </p>

                    <!-- FEATURES -->
                    <ul class="highlights">
                        <li>✔ Chauffeur Included</li>
                        <li>✔ Premium Leather Interior</li>
                        <li>✔ Starlight Ceiling</li>
                        <li>✔ Smooth Silent Drive</li>
                    </ul>

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
                        <button class="tab-btn" data-tab="reviews">Reviews</button>
                    </div>

                    <div id="desc" class="tab-content active">
                        <p>
                            Experience the pinnacle of luxury travel with the Rolls-Royce Cullinan — a
                            masterpiece
                            crafted for those who expect nothing but excellence. Designed with precision and
                            handcrafted perfection, this ultra-luxury SUV delivers a seamless blend of power,
                            comfort, and prestige.
                        </p>

                        <p>
                            Whether it’s a grand wedding entry, VIP airport transfer, or a high-profile business
                            engagement, the Cullinan ensures you arrive with unmatched elegance and authority.
                            The whisper-quiet cabin, signature starlight headliner, and superior ride quality
                            redefine what it means to travel in style.
                        </p>

                        <p>
                            Every journey becomes an experience — smooth, refined, and unforgettable.
                        </p>
                    </div>

                    <div id="specs" class="tab-content">
                        <ul class="specs-list">
                            <li><strong>Seating Capacity:</strong> 4 / 5 Seater Luxury Configuration</li>
                            <li><strong>Engine:</strong> 6.75L Twin-Turbo V12</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Interior:</strong> Handcrafted Leather with Wood Finish</li>
                            <li><strong>Entertainment:</strong> Bespoke Sound System</li>
                            <li><strong>Special Feature:</strong> Starlight Headliner</li>
                            <li><strong>Comfort:</strong> Dual Climate Control</li>
                            <li><strong>Driver:</strong> Professional Chauffeur Included</li>
                            <li><strong>Usage:</strong> Weddings, VIP Travel, Corporate, Events</li>
                        </ul>
                    </div>

                    <div id="reviews" class="tab-content">
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
                    </div>

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
                    <a href="#" class="btn">Explore Our Fleet</a>
                </div>

                <div class="right">
                    <h2>Explore More of Our<br>Luxury Fleet</h2>
                </div>
            </div>

            <!-- Cards -->
            <div class="car-grid">

                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a" />
                    <div class="card-overlay">
                        <span>Mercedes</span>
                        <h3>S580e</h3>
                        <p>Price</p>
                        <h4>£300/day</h4>
                    </div>
                </div>

                <div class="car-card">
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
                </div>

            </div>

        </div>
    </section>

@endsection
