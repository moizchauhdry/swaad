@extends('layouts.frontend')

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
                                <h2>{{session('lan') == 'en' ? 'Our Menu' : 'Unser Menü'}}</h2>
                                <p><a href="{{route('categories')}}"
                                        class="btn btn-primary">{{session('lan') == 'en' ? 'View All' : 'Alle ansehen'}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($categories->slice(0,1) as $category)
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="{{route('getProductsByCategory',$category->id)}}">
                                        @if (session('lan') == 'en')
                                        {{$category->title}}
                                        @else
                                        {{$category->title_gr}}
                                        @endif
                                    </a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                        @foreach ($categories->slice(1,1) as $category)
                        <div class="category-wrap ftco-animate img d-flex align-items-end"
                            style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="{{route('getProductsByCategory',$category->id)}}">
                                        @if (session('lan') == 'en')
                                        {{$category->title}}
                                        @else
                                        {{$category->title_gr}}
                                        @endif
                                    </a>
                                </h2>
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
                        <h2 class="mb-0"><a href="{{route('getProductsByCategory',$category->id)}}">@if (session('lan')
                                == 'en')
                                {{$category->title}}
                                @else
                                {{$category->title_gr}}
                                @endif
                            </a>
                        </h2>
                    </div>
                </div>
                @endforeach
                @foreach ($categories->slice(3,1) as $category)
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                    style="background-image: url({{asset('storage/app/public/'.$category->image_url)}});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="{{route('getProductsByCategory',$category->id)}}">@if (session('lan')
                                == 'en')
                                {{$category->title}}
                                @else
                                {{$category->title_gr}}
                                @endif
                            </a>
                        </h2>
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
                <h2 class="mb-2">{{session('lan') == 'en' ? 'Popular Food Items' : 'Beliebte Lebensmittel'}}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($popularProducts as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="PRODUCT-IMAGE">
                        <span class="status">@if (session('lan') == 'en')
                            {{$product->category->title}}
                            @else
                            {{$product->category->title_gr}}
                            @endif
                        </span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('productDetail',$product->id)}}">@if (session('lan') == 'en')
                                {{$product->title}}
                                @else
                                {{$product->title_gr}}
                                @endif
                            </a>
                        </h3>
                        @include('frontend.pages.partials._spice')
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span class="price-sale">
                                        CHF {{ number_format((float)$product->price, 2, '.', '')}}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                @include('frontend.pages.partials._addToCart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@if ($reviews->count() > 0)
<section class="testimony-section mt-4" style="margin-bottom: 75px">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($reviews as $review)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('public/frontend/images/testimonial.png')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                @if ($review->comment != NULL)
                                <p class="mb-5 pl-4 line">
                                    {{ Str::limit($review->comment, 250) }}
                                </p>
                                @endif
                                <p class="name">
                                    <span class="star">
                                        <span class="star">
                                            @for ($i = 1; $i <= 5; $i++) @if($i <=$review['rating']) <i
                                                class="fa fa-star text-warning">
                                                </i>
                                                @else
                                                <span class="fa fa-star"></span>
                                                @endif
                                                @endfor
                                        </span>
                                    </span>
                                </p>
                                <span class="position">{{$review->user->name}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

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
                $('#add_to_cart_'+product_id).addClass('hidden');
                $('#success_'+product_id).removeClass('hidden');
                $("#qty_"+product_id).empty();
                $("#qty_"+product_id).append(1);
                $("#cart_items_count").html(response);
            }
        });
    }

    function cartIncrement(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.increment')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                $("#qty_"+product_id).empty();
                $("#qty_"+product_id).append(response);
            }
        });
    }

    function cartDecrement(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.decrement')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                $("#qty_"+product_id).empty();
                $("#qty_"+product_id).append(response);
            }
        });
    }
</script>

@endsection