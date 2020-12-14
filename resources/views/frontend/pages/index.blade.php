@extends('layouts.frontend')

<style>
    .hidden {
        display: none;
    }
</style>
@section('slider')
@include('frontend.includes.slider')
@endsection

@section('content')
<section class="ftco-category ftco-no-pt mb-4" style="margin-top:75px">
    <div class=" container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                            style="background-image: url({{asset('public/frontend/images/category.jpg')}});">
                            <div class="text text-center">
                                <h2>Our Menu</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="#" class="btn btn-primary">View All</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($categories->slice(0,1) as $category)
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">{{$category->title}}</a></h2>
                            </div>
                        </div>
                        @endforeach
                        @foreach ($categories->slice(1,1) as $category)
                        <div class="category-wrap ftco-animate img d-flex align-items-end"
                            style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">{{$category->title}}</a></h2>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @foreach ($categories->slice(2,1) as $category)
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                    style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">{{$category->title}}</a></h2>
                    </div>
                </div>
                @endforeach
                @foreach ($categories->slice(3,1) as $category)
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                    style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">{{$category->title}}</a></h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section style="margin-top:75px">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-2">Popular Food Items</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($popularProducts as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="PRODUCT-IMAGE">
                        <span class="status">{{$product->category->title}}</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{$product->title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span class="price-sale">
                                        $ {{ number_format((float)$product->price, 2, '.', '')}}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                {{-- <a href="#" id="cart-btn"
                                    class="buy-now d-flex justify-content-center align-items-center mx-1"
                                    onclick="addToCart('{{$product->id}}')">
                                <span><i class="ion-ios-cart"></i></span>
                                </a> --}}
                                @if (Cart::get($product->id))
                                <button id="success_{{$product->id}}">Added</button>
                                @else
                                <button onclick="addToCart('{{$product->id}}')" id="add_to_cart_{{$product->id}}">
                                    Add to cart</button>
                                <button id="success_{{$product->id}}" class="hidden"></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="testimony-section mt-4" style="margin-bottom: 75px">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                    live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/person_1.jpg')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/person_1.jpg')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/person_1.jpg')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/person_1.jpg')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/person_1.jpg')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script>
    function addToCart(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.store')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                // console.log(response)
                $('#add_to_cart_'+product_id).addClass('hidden');
                $('#success_'+product_id).removeClass('hidden');
                $("#success_"+product_id).append('Item Added To Cart');
            }
        });
    }
</script>

@endsection