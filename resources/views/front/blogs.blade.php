@extends('front.common.layout')

@section('title', 'Blog | SUAVE Executive Travel')

@section('meta_description', 'News, guides and stories from SUAVE Executive Travel - London luxury and supercar rental specialists.')

@section('meta_keywords', 'luxury car blog, supercar news, SUAVE Executive Travel blog')

@section('content')




    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Our Blogs</h1>

                <!-- <ul class="breadcrum">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="#">About us</a></li>
                                        </ul> -->
            </div>
        </div>
    </div>

    <!-- Content Blog -->
    <div class="flat-blog-list main-content">
        <div class="themesflat-container w1320">
            <div class="row">
                <div class="col-lg-8">
                    <div class="flat-blog">
                        @foreach ($blogs as $item)
                            <article class="entry format-standard">
                                <div class="feature-post">
                                    {{-- <div class="category">
                                        <ul class="flex">
                                            <li>
                                                <a href="#">Business</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="image">
                                </div><!-- /.feature-post -->

                                <div class="main-post">
                                    <div class="entry-meta">
                                        <span class="author line"><i class="icon-user"></i><a
                                                href="javascript:void(0)">{{ ucfirst($item->author) }}</a></span>
                                        <span class="comment line"><i class="icon-1"></i><a
                                                href="javascript:void(0)">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</a></span>

                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                    </h2>
                                    <p class="entry-des">
                                        {{ \Illuminate\Support\Str::words(strip_tags($item->description), 50, '[...]') }}
                                    </p>
                                    <div class="btn-read-more">
                                        <a class="more-link" href="{{ url('blog/' . $item->slug) }}">
                                            <span>Read More</span>
                                            <i class="icon-Path-90148"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        {{-- <article class="entry format-standard">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#">Management</a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="assets_front/img/Rent-Lamborghini.webp" alt="image">
                            </div><!-- /.feature-post -->

                            <div class="main-post">
                                <div class="entry-meta">
                                    <span class="author line"><i class="icon-user"></i><a href="#">John</a></span>
                                    <span class="comment line"><i class="icon-uniE971"></i><a href="#">25 April
                                            2026</a></span>

                                </div>
                                <h2 class="entry-title">
                                    <a href="blog-detail.html">The whimsically named Egg Canvas brainch </a>
                                </h2>
                                <p class="entry-des">There are many variations of passages of Lorem Ipsum
                                    available, but majority have suffered
                                    teration in some form, by injected humour, or randomised words which don't
                                    look even slight
                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="btn-read-more">
                                    <a class="more-link" href="blog-detail.html">
                                        <span>Read MOre</span>
                                        <i class="icon-Path-90148"></i>
                                    </a>
                                </div>
                            </div>
                        </article> --}}

                        {{-- <article class="entry format-standard">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#">Finance</a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="assets_front/img/car3.jpg" alt="image">
                            </div><!-- /.feature-post -->

                            <div class="main-post">
                                <div class="entry-meta">
                                    <span class="author line"><i class="icon-user"></i><a href="#">John</a></span>
                                    <span class="comment line"><i class="icon-uniE971"></i><a href="#">25 April
                                            2026</a></span>

                                </div>
                                <h2 class="entry-title">
                                    <a href="blog-detail.html">The whimsically named Egg Canvas brainch </a>
                                </h2>
                                <p class="entry-des">There are many variations of passages of Lorem Ipsum
                                    available, but majority have suffered
                                    teration in some form, by injected humour, or randomised words which don't
                                    look even slight
                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="btn-read-more">
                                    <a class="more-link" href="blog-detail.html">
                                        <span>Read MOre</span>
                                        <i class="icon-Path-90148"></i>
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="entry format-standard">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#">Sports</a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="assets_front/img/car4.jpg" alt="image">
                            </div><!-- /.feature-post -->

                            <div class="main-post">
                                <div class="entry-meta">
                                    <span class="author line"><i class="icon-user"></i><a href="#">John</a></span>
                                    <span class="comment line"><i class="icon-uniE971"></i><a href="#">25 April
                                            2026</a></span>

                                </div>
                                <h2 class="entry-title">
                                    <a href="blog-detail.html">The whimsically named Egg Canvas brainch </a>
                                </h2>
                                <p class="entry-des">There are many variations of passages of Lorem Ipsum
                                    available, but majority have suffered
                                    teration in some form, by injected humour, or randomised words which don't
                                    look even slight
                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="btn-read-more">
                                    <a class="more-link" href="blog-detail.html">
                                        <span>Read MOre</span>
                                        <i class="icon-Path-90148"></i>
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="entry format-standard">
                            <div class="feature-post">
                                <div class="category">
                                    <ul class="flex">
                                        <li>
                                            <a href="#">Techology</a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="assets_front/img/car5.jpg" alt="image">
                            </div><!-- /.feature-post -->

                            <div class="main-post">
                                <div class="entry-meta">
                                    <span class="author line"><i class="icon-user"></i><a href="#">John</a></span>
                                    <span class="comment line"><i class="icon-uniE971"></i><a href="#">25 April
                                            2026</a></span>

                                </div>
                                <h2 class="entry-title">
                                    <a href="blog-detail.html">The whimsically named Egg Canvas brainch </a>
                                </h2>
                                <p class="entry-des">There are many variations of passages of Lorem Ipsum
                                    available, but majority have suffered
                                    teration in some form, by injected humour, or randomised words which don't
                                    look even slight
                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="btn-read-more">
                                    <a class="more-link" href="blog-detail.html">
                                        <span>Read MOre</span>
                                        <i class="icon-Path-90148"></i>
                                    </a>
                                </div>
                            </div>
                        </article> --}}
                    </div>
                    {{-- <div class="tf-pagination mt-60">
                        <a class="prev page-numbers" href="#">
                            <i class="icon-3"></i>
                        </a>
                        <a class="page-numbers" href="#">1</a>
                        <a class="page-numbers active" href="#">2</a>
                        <a class="page-numbers" href="#">3</a>
                        <a class="page-numbers" href="#">...</a>
                        <a class="next page-numbers" href="#">
                            <i class="icon--1"></i>
                        </a>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <aside class="side-blog">
                        <div class="inner-side-bar pl-30">

                            {{-- <div class="widget widget-search ">
                                <h3 class="widget-title">
                                    search here
                                </h3>
                                <form role="search" method="get" class="search-form" action="/">
                                    <label>
                                        <input type="search" value="" name="s" class="s"
                                            placeholder="Search here...">
                                    </label>
                                    <button type="submit" class="search-submit"><i class="icon-search-1"></i></button>
                                </form>
                            </div> --}}
                            <div class="widget widget-recent">
                                <h3 class="widget-title ">
                                    Related Blogs
                                </h3>
                                <div class="recent-post-list">
                                    @foreach ($recentBlogs as $item)
                                        <div class="list-recent">
                                            <div class="recent-image">
                                                <a href="{{ url('blog/' . $item->slug) }}">
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Image">
                                                </a>
                                            </div>
                                            <div class="recent-info">
                                                <div class="meta">
                                                    <i class="icon-1"></i>
                                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</span>
                                                </div>
                                                <h4 class="title">
                                                    <a
                                                        href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- <div class="widget widget-categories">
                                <h3 class="widget-title ">
                                    Catagories
                                </h3>
                                <ul>
                                    <li>
                                        <a href="#" class="category">
                                            <span>Graphic Design</span>
                                            <div class="number-category">03</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="category active">
                                            <span>Web Development</span>
                                            <div class="number-category">03</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="category">
                                            <span>Digital Marketing</span>
                                            <div class="number-category">03</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="category">
                                            <span> UI/UX Development</span>
                                            <div class="number-category">03</div>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                            {{-- <div class="widget widget-tags">
                                <h3 class="widget-title ">
                                    Tags
                                </h3>
                                <div class="tags_cloud_inner">
                                    <a href="#">Design</a>
                                    <a href="#">marketing</a>
                                    <a href="#">search</a>
                                    <a href="#">branding</a>
                                    <a href="#">startup</a>
                                    <a href="#">tech</a>
                                    <a href="#" class="active">landing </a>
                                    <a href="#">coding</a>
                                </div>
                            </div> --}}
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>




@endsection
