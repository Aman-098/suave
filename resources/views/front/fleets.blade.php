@extends('front.common.layout')

@section('title', 'Our Fleet | Luxury & Supercar Hire | SUAVE Executive Travel')

@section('meta_description', 'Browse the SUAVE Executive Travel fleet of luxury and supercars available to hire in London, including Lamborghini, Ferrari, Rolls-Royce, Bentley and more.')

@section('meta_keywords', 'luxury car fleet, supercar hire London, rent Lamborghini London, rent Rolls Royce London')

<style>
    .category-heading {
        margin-bottom: 30px;
    }

    .category-heading h3 {
        font-size: 28px;
        font-weight: 700;
        margin: 2rem 0;
        position: relative;
        padding-left: 18px;
        color: white !important;
    }

    .category-heading h3:before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 28px;
        background: #c8a45d;
        border-radius: 10px;
    }

    
</style>

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Our Fleet</h1>
            </div>
        </div>
    </div>


    {{-- contact form  --}}
    {{-- <div class="suave-consult-wrap">
        <div class="suave-consult-card">
            <h2 class="suave-consult-title">Get a Quote</h2>

            <form id="suave_consult_form"  method="POST">
                @csrf
                <div class="suave-consult-row">
                    <div class="suave-consult-field">
                        <label for="sc_name">Name</label>
                        <input type="text" name="name" id="sc_name" name="name" />
                        <span class="text-danger" id="nameError"></span>
                    </div>

                    <div class="suave-consult-field">
                        <label for="sc_phone">Phone</label>
                        <input type="text" id="sc_phone" name="phone" />
                        <span class="text-danger" id="phoneError"></span>
                    </div>

                    <div class="suave-consult-field">
                        <label for="sc_email">Email</label>
                        <input type="email" id="sc_email" name="email" />
                        <span class="text-danger" id="emailError"></span>
                    </div>
                </div>

                <div class="suave-consult-row">
                    <div class="suave-consult-field full">
                        <label for="sc_message">Message</label>
                        <textarea id="sc_message" name="message"></textarea>
                        <span class="text-danger" id="messageError"></span>
                    </div>
                </div>

                <div class="suave-consult-btn-row">
                    <button type="submit" class="suave-consult-btn">Submit</button>
                </div>

            </form>
        </div>
    </div> --}}



    {{-- new design for listing --}}
    <div class="widget-populer-makes-h5">
        <div class="themesflat-container">
            <div class="populer-makes">

                <ul class="nav nav-pills tab-car-service-v2 justify-content-center mb-30" id="pills-tab-service-v2"
                    role="tablist">
                    {{-- ALL TAB --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-all" type="button"
                            role="tab">
                            All
                        </button>
                    </li>

                    @php $i = 0; @endphp

                    @foreach ($fleets as $categoryName => $products)
                        {{-- @php $slug = Str::slug($categoryName); @endphp --}}
                        <li class="nav-item" role="presentation">
                            {{-- <button class="nav-link" id="pills-cadilliac-tab-service-v2" data-bs-toggle="pill"
                                data-bs-target="#tab-{{ $categoryName }}" type="button" role="tab"
                                aria-selected="true"> {{ $categoryName === 'SUV' ? 'Performance SUV' : $categoryName }}</button> --}}
                            <button class="nav-link" id="pills-cadilliac-tab-service-v2" data-bs-toggle="pill"
                                data-bs-target="#tab-{{ $categoryName }}" type="button" role="tab"
                                aria-selected="true">
                                {{ $categoryName === 'SUV' ? 'Performance SUV' : ($categoryName === 'Wedding' ? 'Wedding Cars' : $categoryName) }}
                            </button>
                        </li>
                        @php $i++; @endphp
                    @endforeach

                </ul>


                <div id="videoPopup" class="video-popup">
                    <div class="video-content">
                        <span class="close-btn-video" onclick="closeVideo()">✖</span>

                        <iframe id="videoFrame" src="" frameborder="0" allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>


                <div id="videoPopup" class="video-popup">
                    <button class="close-btn" onclick="closeVideo()">
                        <svg viewBox="0 0 24 24">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <div class="video-content">
                        <iframe id="videoFrame" src="" allowfullscreen>
                        </iframe>
                    </div>

                </div>

                <div class="tab-content" id="pills-tabContent-v2">

                    {{-- ALL PRODUCTS TAB --}}
                    {{-- <div class="tab-pane fade show active" id="tab-all" role="tabpanel">
                        <div class="car-list-item">

                            @foreach ($fleets as $categoryName => $products)
                                <div class="category-heading mb-4">
                                    <h3>{{ $categoryName }}</h3>
                                </div>

                                @foreach ($products as $item)
                                    <div class="tf-car-service">
                                        <a href="{{ url('fleet/' . $item->slug) }}" class="image">
                                            <div class="stm-badge-top">
                                                @if (!empty($item->badge))
                                                    <div class="feature">
                                                        <span>{{ $item->badge }}</span>
                                                    </div>
                                                @endif
                                                @if (!empty($item->video))
                                                    <div class="play-btn" onclick="openVideo()">
                                                        <svg viewBox="0 0 24 24">
                                                            <polygon points="8,5 19,12 8,19"></polygon>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }} hire in London">
                                        </a>
                                        <div class="content">
                                            <h6 class="title">{{ $item->name }}</h6>
                                            <div class="description">

                                                <span>₤ {{ number_format($item->price, 2) }} /Day</span>
                                            </div>
                                            <div class="bottom-btn-wrap-fleet">
                                                <div class="btn-read-more">
                                                    <a class="more-link" href="{{ url('fleet/' . $item->slug) }}">
                                                        <span>View details</span>
                                                        <i class="icon-arrow-right2"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group-panel">

                                                    <a href="tel:+4408081680808" class="icon-service">
                                                        <svg width="18" height="18" viewBox="0 0 24 24"
                                                            fill="#fff">
                                                            <path
                                                                d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                        </svg>
                                                    </a>
                                                    <a href="https://wa.me/+4408081680808" target="_blank"
                                                        class="icon-service">
                                                        <i class="icon-whatsapp-1"></i>
                                                    </a>
                                                    <a href="{{ url('fleet/' . $item->slug) }}" class="icon-service">
                                                        Book Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div> --}}
                    <div class="tab-pane fade show active" id="tab-all" role="tabpanel">

                        @foreach ($fleets as $categoryName => $products)
                            <div class="category-heading mb-2">
                                {{-- <h3>{{ $categoryName === 'SUV' ? 'Performance SUV' : $categoryName }}</h3> --}}
                                <h3>
                                    @if ($categoryName === 'SUV')
                                        Performance SUV
                                    @elseif($categoryName === 'Wedding')
                                        Wedding Cars
                                    @else
                                        {{ $categoryName }}
                                    @endif
                                </h3>
                            </div>

                            <div class="car-list-item">

                                @foreach ($products as $item)
                                    <div class="tf-car-service">
                                        <a href="{{ url('fleet/' . $item->slug) }}" class="image">
                                            <div class="stm-badge-top">
                                                @if (!empty($item->badge))
                                                    <div class="feature">
                                                        <span>{{ $item->badge }}</span>
                                                    </div>
                                                @endif

                                                @if (!empty($item->video))
                                                    <div class="play-btn" onclick="openVideo()">
                                                        <svg viewBox="0 0 24 24">
                                                            <polygon points="8,5 19,12 8,19"></polygon>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }} hire in London">
                                        </a>

                                        <div class="content">
                                            <h6 class="title">{{ $item->name }}</h6>

                                            <div class="description">
                                                @if ((float) $item->price == 0)
                                                    <span>POA (Price on Application)</span>
                                                @else
                                                    <span>₤ {{ number_format((float) $item->price, 2) }} /Day</span>
                                                @endif
                                            </div>

                                            <div class="bottom-btn-wrap-fleet">
                                                <div class="btn-read-more">
                                                    <a class="more-link" href="{{ url('fleet/' . $item->slug) }}">
                                                        <span>View details</span>
                                                        <i class="icon-arrow-right2"></i>
                                                    </a>
                                                </div>

                                                <div class="btn-group-panel">
                                                    <a href="tel:+4408081680808" class="icon-service">
                                                        <svg width="18" height="18" viewBox="0 0 24 24"
                                                            fill="#fff">
                                                            <path
                                                                d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z">
                                                            </path>
                                                        </svg>
                                                    </a>

                                                    <a href="https://wa.me/+4408081680808" target="_blank"
                                                        class="icon-service">
                                                        <i class="icon-whatsapp-1"></i>
                                                    </a>

                                                    <a href="{{ url('fleet/' . $item->slug) }}" class="icon-service">
                                                        Book Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                    </div>

                    @php $i = 0; @endphp

                    @foreach ($fleets as $categoryName => $products)
                        {{-- @php $slug = Str::slug($categoryName); @endphp --}}
                        <div class="tab-pane fade" id="tab-{{ $categoryName }}" role="tabpanel">
                            <div class="car-list-item">
                                @foreach ($products as $item)
                                    <div class="tf-car-service">
                                        <a href="{{ url('fleet/' . $item->slug) }}" class="image">
                                            <div class="stm-badge-top">
                                                @if (!empty($item->badge))
                                                    <div class="feature">
                                                        <span>{{ $item->badge }}</span>
                                                    </div>
                                                @endif
                                                @if (!empty($item->video))
                                                    <div class="play-btn" onclick="openVideo()">
                                                        <svg viewBox="0 0 24 24">
                                                            <polygon points="8,5 19,12 8,19"></polygon>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }} hire in London">
                                        </a>
                                        <div class="content">
                                            <h6 class="title">{{ $item->name }}</h6>
                                            <div class="description">

                                                @if ((float) $item->price == 0)
                                                    <span>POA (Price on Application)</span>
                                                @else
                                                    <span>₤ {{ number_format((float) $item->price, 2) }} /Day</span>
                                                @endif

                                                {{-- <span>₤ {{ number_format($item->price, 2) }} /Day</span> --}}
                                            </div>
                                            <div class="bottom-btn-wrap-fleet">
                                                <div class="btn-read-more">
                                                    <a class="more-link" href="{{ url('fleet/' . $item->slug) }}">
                                                        <span>View details</span>
                                                        <i class="icon-arrow-right2"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group-panel">

                                                    <a href="tel:+4408081680808" class="icon-service">
                                                        <svg width="18" height="18" viewBox="0 0 24 24"
                                                            fill="#fff">
                                                            <path
                                                                d="M6.6 10.8C8.1 13.8 10.2 15.9 13.2 17.4L15.6 15C15.9 14.7 16.3 14.6 16.7 14.7C18 15.1 19.4 15.3 20.8 15.3C21.3 15.3 21.7 15.7 21.7 16.2V20C21.7 20.5 21.3 20.9 20.8 20.9C10.4 20.9 2.1 12.6 2.1 2.2C2.1 1.7 2.5 1.3 3 1.3H6.8C7.3 1.3 7.7 1.7 7.7 2.2C7.7 3.6 7.9 5 8.3 6.3C8.4 6.7 8.3 7.1 8 7.4L6.6 10.8Z" />
                                                        </svg>
                                                    </a>
                                                    <a href="https://wa.me/+4408081680808" target="_blank"
                                                        class="icon-service">
                                                        <i class="icon-whatsapp-1"></i>
                                                    </a>
                                                    <a href="{{ url('fleet/' . $item->slug) }}" class="icon-service">
                                                        Book Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper('.sport-slider', {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,

                navigation: {
                    nextEl: '.sport-next',
                    prevEl: '.sport-prev',
                },

                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                }
            });

            new Swiper('.luxury-slider', {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,

                navigation: {
                    nextEl: '.luxury-next',
                    prevEl: '.luxury-prev',
                },

                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                }
            });

        });

        // $('#suave_consult_form').submit(function(e) {
        //     e.preventDefault();

        //     // Clear old errors
        //     $('.text-danger').text('');

        //     var name = $('#sc_name').val().trim();
        //     var phone = $('#sc_phone').val().trim();
        //     var email = $('#sc_email').val().trim();
        //     var message = $('#sc_message').val().trim();

        //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        //     // Name validation
        //     if (name === '') {
        //         showError('#nameError', 'required.');
        //         return false;
        //     }

        //     // Phone validation
        //     if (phone === '') {
        //         showError('#phoneError', 'required.');
        //         return false;
        //     }

        //     // Email validation
        //     if (email === '') {
        //         showError('#emailError', 'required.');
        //         return false;
        //     } else if (!emailRegex.test(email)) {
        //         showError('#emailError', 'Enter a valid email.');
        //         return false;
        //     }

        //     // Message validation
        //     if (message === '') {
        //         showError('#messageError', 'required.');
        //         return false;
        //     }

        //     var formdata = $(this).serialize();

        //     $.ajax({
        //         url: "{{ route('footer.save') }}",
        //         type: 'POST',
        //         data: formdata,
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.status === true) {
        //                 notyf.success(response.message);
        //                 $('#suave_consult_form')[0].reset();
        //                 setTimeout(function () {
        //                         window.location.href = response.redirect;
        //                     }, 1000);
        //             } else {
        //                 notyf.error(response.message);
        //             }
        //         },
        //         error: function(xhr) {
        //             if (xhr.responseJSON && xhr.responseJSON.message) {
        //                 notyf.error(xhr.responseJSON.message);
        //             } else {
        //                 notyf.error('Something went wrong');
        //             }
        //         }
        //     });

        //     function showError(element, message) {
        //         $(element).text(message).show();
        //         setTimeout(() => {
        //             $(element).fadeOut();
        //         }, 3000);
        //     }
        // });
    </script>
@endpush
