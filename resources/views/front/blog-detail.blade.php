@extends('front.common.layout')

@section('title', $metaTitle)

@section('meta_description', $metaDescription)

@section('meta_keywords', 'SUAVE Executive Travel blog, luxury car hire London')

@section('og_image', asset('storage/' . $blog->image))

@section('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BlogPosting",
        "headline": @json($blog->title),
        "description": @json($metaDescription),
        "image": "{{ asset('storage/' . $blog->image) }}",
        "author": {
            "@@type": "Person",
            "name": @json($blog->author)
        },
        "publisher": {
            "@@type": "Organization",
            "name": "SUAVE Executive Travel",
            "logo": {
                "@@type": "ImageObject",
                "url": "{{ asset('assets_front/images/logo/logo.png') }}"
            }
        },
        "datePublished": "{{ \Carbon\Carbon::parse($blog->created_at)->toIso8601String() }}",
        "dateModified": "{{ \Carbon\Carbon::parse($blog->updated_at ?? $blog->created_at)->toIso8601String() }}",
        "mainEntityOfPage": {
            "@@type": "WebPage",
            "@@id": "{{ url()->current() }}"
        }
    }
</script>
@endsection

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h2 class="main-title">Our Blog</h2>

                <!-- <ul class="breadcrum">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">About us</a></li>
                            </ul> -->
            </div>
        </div>
    </div>

    <!-- Content Blog -->
    <section class="flat-blog-list main-content">
        <div class="themesflat-container w1320">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post-wrap">
                        <article class="entry format-standard-details">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ ucfirst($blog->title) }}" class="imge-blog-details mb-25">
                            <div class="entry-meta horizontal">
                                <span class="author line"><i class="icon-user"></i><a href="#">{{ ucfirst($blog->author) }}</a></span>
                                <span class="comment line"><i class="icon-1"></i><a href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</a></span>
                            </div>
                            <h1 class="entry-title mb-20">
                                <a href="javascript:void(0);">{{ $blog->title }}</a>
                            </h1>
                            {!! $blog->description !!}
                            
                        </article>
                        

                        {{-- <div class="tag-wrap">
                            <div class="share-box flex align-center">
                                <p>Share:</p>
                                <ul class="social-icon icon-share">
                                    <li>
                                        <a href="#"><i class="icon-6"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-4"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-5"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-7"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
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
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ ucfirst($item->title) }}">
                                                </a>
                                            </div>
                                            <div class="recent-info">
                                                <div class="meta">
                                                    <i class="icon-1"></i>
                                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</span>
                                                </div>
                                                <h4 class="title">
                                                    <a href="{{ url('blog/' . $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="list-recent">
                                        <div class="recent-image">
                                            <a href="#">
                                                <img src="assets/img/car2.jpg" alt="Image">
                                            </a>
                                        </div>
                                        <div class="recent-info">
                                            <div class="meta">
                                                <i class="icon-1"></i>
                                                <span>Jan 23,2022</span>
                                            </div>
                                            <h4 class="title">
                                                <a href="#">The Best Products That Shape Fashion</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="list-recent">
                                        <div class="recent-image">
                                            <a href="#">
                                                <img src="assets/img/car3.jpg" alt="Image">
                                            </a>
                                        </div>
                                        <div class="recent-info">
                                            <div class="meta">
                                                <i class="icon-1"></i>
                                                <span>Jan 23,2022</span>
                                            </div>
                                            <h4 class="title">
                                                <a href="#">The Best Products That Shape Fashion</a>
                                            </h4>
                                        </div>
                                    </div> --}}
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
                            </div>
                            <div class="widget widget-tags">
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
    </section>


@endsection
