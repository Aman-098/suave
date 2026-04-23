@extends('front.common.layout')

@section('title', $blog->title)

@section('meta_description', 'solar')

@section('meta_keywords', 'solar')



@section('content')

    <main>

        <div class="ul-container">
            <div class="ul-breadcrumb">
                <h2 class="ul-breadcrumb-title">{{ $blog->title }}</h2>
                <div class="ul-breadcrumb-nav">
                    <a href="index.html"><i class="flaticon-home"></i> Home</a>
                    <i class="flaticon-arrow-point-to-right"></i>
                    <span class="current-page">{{ $blog->title }}</span>
                </div>
            </div>
        </div>



        <div class="ul-inner-page-container">
            <div class="row ul-bs-row">
                <div class="col-xxxl-9 col-lg-8 col-md-7">
                    <!-- blog details -->
                    <div class="ul-blog-details">
                        <div class="ul-blog ul-blog-big">
                            <h3 class="ul-blog-title"><a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>

                            <div class="ul-blog-img">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                                <div class="ul-blog-infos ul-blog-details-infos flex gap-x-[30px] mb-[16px]">
                                    <!-- single info -->
                                    <div class="ul-blog-info">
                                        <span class="icon"><i class="flaticon-user-2"></i></span>
                                        <span
                                            class="text font-normal text-[14px] text-etGray">{{ ucfirst($blog->author) }}</span>
                                    </div>
                                    <!-- single info -->
                                    <div class="ul-blog-info">
                                        <span class="icon"><i class="flaticon-calendar"></i></span>
                                        <span
                                            class="text font-normal text-[14px] text-etGray">{{ \Carbon\Carbon::parse($blog->created_at)->format('F d Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="ul-blog-txt">
                                {!! $blog->description !!}


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-3 col-lg-4 col-md-5">
                    <div class="ul-blog-sidebar">
                        <div class="ul-blog-sidebar-widget ul-blog-sidebar-recent-post">
                            <h3 class="ul-blog-sidebar-widget-title">Popular Blog</h3>
                            <div class="ul-blog-sidebar-widget-content">
                                <div class="ul-blog-recent-posts">

                                    @foreach ($recentBlogs as $item)
                                        <div class="ul-blog-recent-post">
                                            <div class="img">
                                                <a href="{{ url('blog/' . $item->slug) }}"><img
                                                        src="{{ asset('storage/' . $item->image) }}" alt=""></a>
                                            </div>
                                            <div class="txt">
                                                <span class="date">
                                                    <span class="icon"><i class="flaticon-calendar"></i></span>
                                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('F d Y') }}</span>
                                                </span>
                                                <h4 class="title"><a
                                                        href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                                </h4>
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

    </main>

@endsection
