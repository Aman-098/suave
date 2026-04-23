@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'solar')

@section('meta_keywords', 'solar')

@section('content')


    <main>

        <div class="container-fluid main-slider-panel">
            <div class="slider">
                @foreach ($sliders as $item)
                    <div class="slide">
                        <div class="inner-slide">
                            <div class="lft-slide">
                                <!-- <span>January Sale</span> -->
                                <h2>{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="slider_btn"><a href="{{ route('front.products') }}" class="ul-btn">Shop now</a>
                                </div>
                            </div>

                            <div class="rgt-slide">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="image">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        <div class="ul-container">
            <section class="ul-categories">
                <div class="ul-inner-container">
                    <div class="ul-section-heading text-center justify-content-center">
                        <div>
                            <h2 class="ul-section-title">Popular Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 row-cols-xxs-1 ul-bs-row">

                    @foreach ($categories as $item)
                        <div class="col">
                            <a class="ul-category" href="{{ url('category/' . $item->slug) }}">
                                <div class="ul-category-img">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Category Image">
                                </div>
                                <div class="ul-category-txt">
                                    <span>{{ strtoupper($item->name) }}</span>
                                    <p>{{ $item->products_count }} Items</p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
        </div>
        </section>
        </div>

        <div class="cat-title-line">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <img src="images/image001.jpg" alt="Paris" class="center">
                </div>
            </div>
        </div>

        <!-- MOST SELLING START -->
        <div class="ul-container bet-cat-products">
            <section class="ul-products ul-most-selling-products">
                <div class="ul-inner-container">
                    <div class="ul-section-heading flex-lg-row flex-column text-md-start text-center">
                        <div class="left">
                            <h2 class="ul-section-title">Trending Products</h2>
                        </div>
                        <div class="right">
                            <div class="ul-most-sell-filter-navs">
                                <button type="button" data-filter="all">All</button>
                                @foreach ($categories as $cat)
                                    <button type="button" data-filter=".category{{ $cat->id }}">
                                        {{ strtoupper($cat->name) }}
                                    </button>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div
                        class="ul-bs-row row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 ul-filter-products-wrapper">

                        @foreach ($products as $item)
                            <div class="mix col category{{ $item->category_id }}">
                                <div class="ul-product">
                                    <div class="ul-product-heading">
                                        <span class="ul-product-price">&pound;{{ $item->price }}</span>
                                        <span class="rating product-rating-layout">
                                            <div class="rating1 ">
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="ul-product-img">
                                        <a href="{{ url('product/' . $item->slug) }}">
                                            <img src="{{ asset('storage/' . $item->image1) }}" alt="Product Image">
                                        </a>

                                    </div>
                                    <div class="ul-product-txt">
                                        <h4 class="ul-product-title"><a
                                                href="{{ url('product/' . $item->slug) }}">{{ $item->name }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
            </section>
        </div>
        <!-- MOST SELLING END -->


        <div class="ul-container new-arrival-sec">
            <section class="ul-products">
                <div class="ul-inner-container">
                    <div class="ul-section-heading">
                        <div class="left">
                            <span class="ul-section-sub-title">Best Sellers</span>
                            <h2 class="ul-section-title">New Arrival Collection</h2>
                        </div>

                        <div class="right"><a href="{{ route('front.products') }}" class="ul-btn">More Collection <i
                                    class="flaticon-up-right-arrow"></i></a></div>
                    </div>

                    <div class="row ul-bs-row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="ul-products-sub-banner">
                                <div class="ul-products-sub-banner-img">
                                    <img src="images/house.jpg" alt="">
                                </div>
                                <div class="ul-products-sub-banner-txt">
                                    <h3 class="ul-products-sub-banner-title">Solar Balcony/Garden Workshop</h3>
                                    <a href="category/solar-products.html" class="ul-btn">Shop Now <i
                                            class="flaticon-up-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-12">

                            <div class="swiper ul-products-slider-1">
                                <div class="swiper-wrapper">
                                    @foreach ($new_Arrival as $item)
                                        <div class="swiper-slide">
                                            <div class="mix col best-selling">
                                                <div class="ul-product">
                                                    <div class="ul-product-heading">
                                                        <span class="ul-product-price">&pound;{{ $item->price }}</span>
                                                        <span class="rating product-rating-layout">
                                                            <div class="rating1 ">
                                                                <i class="flaticon-star"></i>
                                                                <i class="flaticon-star"></i>
                                                                <i class="flaticon-star"></i>
                                                                <i class="flaticon-star"></i>
                                                                <i class="flaticon-star"></i>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="ul-product-img">
                                                        <a href="{{ url('product/' . $item->slug) }}">
                                                            <img src="{{ asset('storage/' . $item->image1) }}"
                                                                alt="Product Image">
                                                        </a>
                                                        <!-- <div class="ul-product-actions">
                                                                            <a href="javascript:void(0)" onclick="sendtocart('1')"><i class="flaticon-shopping-bag"></i></a>
                                                                        </div> -->
                                                    </div>
                                                    <div class="ul-product-txt">
                                                        <!-- <div class="ul-product-rating">
                                                                         <div class="rating1 ">
                                                                    <i class="flaticon-star"></i>
                                                                    <i class="flaticon-star"></i>
                                                                    <i class="flaticon-star"></i>
                                                                    <i class="flaticon-star"></i>
                                                                    <i class="flaticon-star"></i>
                                                                    </div>
                                                                                                                        
                                                                        </div> -->
                                                        <h4 class="ul-product-title"><a
                                                                href="{{ url('product/' . $item->slug) }}">{{ $item->name }}</a>
                                                        </h4>
                                                        <!-- <div class="ul-product-heading">
                                                                            <span class="ul-product-price">&pound;290.00</span>
                                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- PRODUCTS SECTION END -->

        <div class="container frame_video">
            <div class="row">
                @foreach ($videos as $item)
                    <div class="col-md-6 v0s">
                        <div class='embed-container'>
                            {!! $item->code !!}
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


        <!-- BLOG SECTION START -->
        <div class="ul-container blogs-panel-pro">
            <section class="ul-blogs">
                <div class="ul-inner-container">
                    <!-- heading -->
                    <div class="ul-section-heading">
                        <div class="left">
                            <span class="ul-section-sub-title">News & Blog</span>
                            <h2 class="ul-section-title">Latest News & Blog</h2>
                        </div>

                        <div>
                            <a href="{{ route('blog') }}" class="ul-blogs-heading-btn">View All BLog <i
                                    class="flaticon-up-right-arrow"></i></a>
                        </div>
                    </div>

                    <!-- blog grid -->
                    <div class="row ul-bs-row row-cols-md-3 row-cols-2 row-cols-xxs-1">
                        @foreach ($blogs as $item)
                            <!-- single blog -->
                            <div class="col">
                                <div class="ul-blog">
                                    <div class="ul-blog-img">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ ucfirst($item->title) }}">
                                        <div class="date">
                                            <span
                                                class="number">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                            <span
                                                class="txt">{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</span>
                                        </div>
                                    </div>

                                    <div class="ul-blog-txt">
                                        <div class="ul-blog-infos flex gap-x-[30px] mb-[16px]">
                                            <!-- single info -->
                                            <div class="ul-blog-info">
                                                <span class="icon"><i class="flaticon-user-2"></i></span>
                                                <span
                                                    class="text font-normal text-[14px] text-etGray">{{ ucfirst($item->author) }}</span>
                                            </div>
                                        </div>

                                        <h3 class="ul-blog-title"><a
                                                href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                        </h3>
                                        <p class="ul-blog-descr">
                                        <p>{{ \Illuminate\Support\Str::words(strip_tags($item->description), 50, '[...]') }}
                                        </p>


                                        <a href="{{ url('blog/' . $item->slug) }}" class="ul-blog-btn">Read More <span
                                                class="icon"><i class="flaticon-up-right-arrow"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- single blog -->
                        {{-- <div class="col">
                            <div class="ul-blog">
                                <div class="ul-blog-img">
                                    <img src="upload_images/ravair_1757402163.jpg" alt="WELCOME TO OUR NEW SITE">
                                    <div class="date">
                                        <span class="number">14</span>
                                        <span class="txt">Oct</span>
                                    </div>
                                </div>

                                <div class="ul-blog-txt">
                                    <div class="ul-blog-infos flex gap-x-[30px] mb-[16px]">
                                        <!-- single info -->
                                        <div class="ul-blog-info">
                                            <span class="icon"><i class="flaticon-user-2"></i></span>
                                            <span class="text font-normal text-[14px] text-etGray">By visualsoft</span>
                                        </div>
                                    </div>

                                    <h3 class="ul-blog-title"><a href="b/welcome-to-our-new-site-3.html">WELCOME TO
                                            OUR NEW SITE</a></h3>
                                    <p class="ul-blog-descr">
                                    <p>We are very pleased to announce the launch of our brand new eCommerce site, and
                                        also our new blog, which will be updated regularly to keep you up to date with
                                        the latest news and special offers.</p< /p>

                                        <a href="b/welcome-to-our-new-site-3.html" class="ul-blog-btn">Read More <span
                                                class="icon"><i class="flaticon-up-right-arrow"></i></span></a>
                                </div>
                            </div>
                        </div> --}}

                        <!-- single blog -->
                        {{-- <div class="col">
                            <div class="ul-blog">
                                <div class="ul-blog-img">
                                    <img src="upload_images/ravair_1665781690.png"
                                        alt="UK COVID-19 CASES RISING AGAIN, AS MONKEYPOX SPREADS AND POLIO RE-EMERGES">
                                    <div class="date">
                                        <span class="number">14</span>
                                        <span class="txt">Oct</span>
                                    </div>
                                </div>

                                <div class="ul-blog-txt">
                                    <div class="ul-blog-infos flex gap-x-[30px] mb-[16px]">
                                        <!-- single info -->
                                        <div class="ul-blog-info">
                                            <span class="icon"><i class="flaticon-user-2"></i></span>
                                            <span class="text font-normal text-[14px] text-etGray">By Ray Vidler</span>
                                        </div>
                                    </div>

                                    <h3 class="ul-blog-title"><a
                                            href="b/uk-covid-19-cases-rising-again%2c-as-monkeypox-spreads-and-polio-re-emerges-2.html">UK
                                            COVID-19 CASES RISING AGAIN, AS MONKEYPOX SPREADS AND POLIO RE-EMERGES</a>
                                    </h3>
                                    <p class="ul-blog-descr">
                                    <p>A third wave of infection from strains of the Omicron variant of
                                        SARS-CoV-2&mdash;Britain&rsquo;s fifth COVID wave&mdash;is pushing infection,
                                        hospitalisation and death rates up again.</p>
                                    <p>Last w</p>

                                    <a href="b/uk-covid-19-cases-rising-again%2c-as-monkeypox-spreads-and-polio-re-emerges-2.html"
                                        class="ul-blog-btn">Read More <span class="icon"><i
                                                class="flaticon-up-right-arrow"></i></span></a>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </section>
        </div>
        <!-- BLOG SECTION END -->

    </main>

@endsection
