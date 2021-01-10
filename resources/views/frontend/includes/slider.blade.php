<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        @foreach ($banners as $banner)
        <div class="slider-item" style="background-image: url({{asset('storage/app/public/'.$banner->image_url)}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>