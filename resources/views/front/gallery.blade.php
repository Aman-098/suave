@extends('front.common.layout')

@section('title', 'Home')

@section('meta_description', 'SUAVE')

@section('meta_keywords', 'SUAVE')

@section('content')

    <div class="tf-page-title mt-10">
        <div class="themesflat-container full">
            <div class="page-title t-al-center">

                <h1 class="main-title">Our Gallery</h1>

                <!-- <ul class="breadcrum">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#">About us</a></li>
                                </ul> -->
            </div>
        </div>
    </div>

    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Our Gallery</h2>

            <div class="gallery-grid">

                @foreach ($gallery as $item)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="">
                    </div>
                @endforeach

                {{-- 
                <div class="gallery-item">
                    <img src="assets_front/img/blog-2.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/blog-3.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/blog-4.webp" alt="">
                </div>
                <div class="gallery-item">
                    <img src="assets_front/img/car1.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car1.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car2.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car2.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car3.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car3.jpg" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car4.webp" alt="">
                </div>

                <div class="gallery-item">
                    <img src="assets_front/img/car4.jpg" alt="">
                </div> --}}
            </div>
        </div>
    </section>

    <!-- LIGHTBOX -->
    <div class="lightbox" id="lightbox">
        <span class="close">&times;</span>
        <img class="lightbox-img" id="lightbox-img">

        <div class="nav prev">&#10094;</div>
        <div class="nav next">&#10095;</div>
    </div>

@endsection

@push('scripts')
        <script>
const images = document.querySelectorAll(".gallery-item img");
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightbox-img");
const closeBtn = document.querySelector(".close");
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");

let currentIndex = 0;

images.forEach((img, index) => {
    img.addEventListener("click", () => {
        lightbox.style.display = "flex";
        lightboxImg.src = img.src;
        currentIndex = index;
    });
});

closeBtn.onclick = () => lightbox.style.display = "none";

nextBtn.onclick = () => {
    currentIndex = (currentIndex + 1) % images.length;
    lightboxImg.src = images[currentIndex].src;
};

prevBtn.onclick = () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    lightboxImg.src = images[currentIndex].src;
};
</script>
    
@endpush