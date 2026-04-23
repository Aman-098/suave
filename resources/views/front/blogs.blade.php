@extends('front.common.layout')

@section('title', 'Blog')

@section('meta_description', 'solar.')

@section('meta_keywords', 'solar')

<style>
    .breadcrumb-bg {
        background-position: center;
        background-size: cover;
        padding: 125px 0 !important;
    }

    .account-title {
        font-size: 24px;
        font-weight: 700;
        color: #333;
    }
</style>

@section('content')
    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">Blogs</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="{{ route('home') }}"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">Blogs</span>
                </div>
            </div>
        </div>

        <!-- blog-area -->
        <section class="blog-area pt-100 pb-100" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach ($blogs as $item)
                            <div class="blog--post--item text-center">
                                <div class="blog-post-thumb mb-35">
                                    <a href="{{ url('blog/' . $item->slug) }}"><img
                                            src="{{ asset('storage/' . $item->image) }}" alt=""></a>
                                </div>
                                <div class="blog-post-content" >
                                    <!-- <div class="tag"><a href="#">Shopping</a></div>-->
                                    <h3><a href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                    </h3>
                                    <div class="blog-post-meta">
                                        <ul>
                                            <li><i class="far fa-user"></i>{{ ucfirst($item->author) }}</li>
                                            <li><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('F d Y') }}</li>
                                        </ul>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::words(strip_tags($item->description), 50, '[...]') }}
                                    </p>
                                    <a href="{{ url('blog/' . $item->slug) }}" >Read More</a>
                                </div>
                            </div>
                        @endforeach


                        <!--<div class="pagination-wrap">
                                            <ul>
                                                <li class="prev"><a href="#">Prev</a></li>
                                                <li><a href="#">1</a></li>
                                                <li class="active"><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">...</a></li>
                                                <li><a href="#">10</a></li>
                                                <li class="next"><a href="#">Next</a></li>
                                            </ul>
                                        </div>-->
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="ul-blog-sidebar">
                            <div class="ul-blog-sidebar-widget ul-blog-sidebar-recent-post">
                                <h3 class="ul-blog-sidebar-widget-title">Popular Blog</h3>
                                <div class="ul-blog-sidebar-widget-content">
                                    <div class="ul-blog-recent-posts">
                                        @foreach ($recentBlogs as $item)
                                            <div class="ul-blog-recent-post">
                                                <div class="img">
                                                    <a
                                                        href="{{ url('blog/' . $item->slug) }}"><img
                                                            src="{{ asset('storage/' . $item->image) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="txt">
                                                    <span class="date">
                                                        <span class="icon"><i class="flaticon-calendar"></i></span>
                                                        <span>{{ \Carbon\Carbon::parse($item->created_at)->format('F d Y') }}</span>
                                                    </span>
                                                    <h4 class="title"><a
                                                            href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->


    </main>
    <!-- main-area-end -->

@endsection
