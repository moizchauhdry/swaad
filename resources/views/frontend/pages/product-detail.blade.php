@extends('layouts.frontend')

<style>
    .progress-bar.bg-warning {
        background: #faca51 !important;
    }

    .star.star-size {
        font-size: 22px;
    }

    @media screen and (min-width: 480px) {
        .progress {
            margin-top: 5px;
            border-radius: 0rem !important;
        }

        .comment-list li .comment-body {
            float: right;
            width: calc(100% - 39px) !important;
        }
    }
</style>

<?php
$max = 0;
$reviews_count = $reviews->count();
foreach ($reviews as $review) { 
    $max = $max + $review->rating;
}
if ($reviews_count != 0) {
    $average = (float) $max/$reviews_count;
    $average_star = intval ($max/$reviews_count);
} else {
    $average = 0;
    $average_star = 0;
}
$unchecked_star = 5 - $average_star;
?>

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Product Detail' : 'Produktdetail'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{asset('storage/app/public/'.$product->image_url)}}" class="image-popup"><img
                        src="{{asset('storage/app/public/'.$product->image_url)}}" class="img-fluid" alt="IMAGE"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>@if (session('lan') == 'en')
                    {{$product->title}}
                    @else
                    {{$product->title_gr}}
                    @endif
                </h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">{{$average}}</a>
                        @for ($i = 0; $i < $average_star; $i++) <i class="fa fa-star text-warning"></i>
                            @endfor
                            @for ($i = 0; $i < $unchecked_star; $i++) <i class="fa fa-star"></i>@endfor
                    </p>
                </div>
                <p class="price">
                    <span> CHF {{ number_format((float)$product->price, 2, '.', '')}}</span>
                </p>
                <p>
                    @if (session('lan') == 'en')
                    {{$product->description}}
                    @else
                    {{$product->description_gr}}
                    @endif
                </p>
                <p>
                    @include('frontend.pages.partials._spice')
                </p>

                @if (Cart::get($product->id))
                <div class="row mt-4" id="success_detail_{{$product->id}}">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field=""
                                onclick="cartDecrementDetail('{{$product->id}}')">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="qty_detail_{{$product->id}}" name="quantity"
                            class="form-control input-number" value="{{Cart::get($product->id)->quantity}}" min="1"
                            max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field=""
                                onclick="cartIncrementDetail('{{$product->id}}')">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                </div>
                @else
                <div class="row mt-4 hidden" id="success_detail_{{$product->id}}">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field=""
                                onclick="cartDecrementDetail('{{$product->id}}')">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="qty_detail_{{$product->id}}" name="quantity"
                            class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field=""
                                onclick="cartIncrementDetail('{{$product->id}}')">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex mb-3">
                        <button onclick="addToCartDetail('{{$product->id}}')" class="btn btn-primary btn-lg" style="color: white;
                            background-color: #f45318 !important; width:100%"
                            id="add_to_cart_detail_{{$product->id}}">Add to Cart</button>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

@if ($relatedProducts->count() > 0)
<section class=" ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">{{session('lan') == 'en' ? 'Products' : 'Produkte'}}</span>
                <h2 class="mb-4">{{session('lan') == 'en' ? 'Related Products' : 'Verwandte Produkte'}}</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($relatedProducts as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="product-image">
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
                                    <span class="price-sale"> CHF {{ number_format((float)$product->price, 2, '.', '')}}
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
@endif

@if ($reviews->count() > 0)
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <div>
                    <h4 class="text-center text-primary bg-light p-2">
                        {{session('lan') == 'en' ? 'Rating & Reviews of' : 'Bewertung & Bewertungen von'}}
                        {{$product->title}}</h4>
                    <div class="well well-sm p-4">
                        <div class="row p-3">
                            <div class="col-md-3">
                                <h1 class="rating-num">
                                    {{$average}}<small class="text-secondary">/5</small></h1>
                                <span class="star star-size">
                                    <span class="star">
                                        @for ($i = 0; $i < $average_star; $i++) <i class="fa fa-star text-warning"></i>
                                            @endfor
                                            @for ($i = 0; $i < $unchecked_star; $i++) <i class="fa fa-star"></i>@endfor
                                    </span>
                                </span>
                                <div>
                                    <span class="glyphicon glyphicon-user"></span>{{$reviews->count()}}
                                    {{session('lan') == 'en' ? 'Ratings' : 'Bewertungen'}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row rating-desc">
                                    <div class="col-xs-3 col-md-3 text-right">
                                        <span class="star">
                                            <span class="star">
                                                @for ($i = 0; $i < 5; $i++) <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-8 col-md-7">
                                        <?php 
                                            $rc = $reviewStarCount->where('rating','5')->count();
                                            $total = $reviews->count();
                                            $percentage = $rc/$total * 100;
                                        ?>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{$reviewStarCount->where('rating','5')->count()}}
                                    </div>
                                    <!-- end 5 -->
                                    <div class="col-xs-3 col-md-3 text-right">
                                        <span class="star">
                                            <span class="star">
                                                @for ($i = 0; $i < 4; $i++) <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 1; $i++) <i class="fa fa-star"></i>@endfor
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-8 col-md-7">
                                        <?php 
                                            $rc = $reviewStarCount->where('rating','4')->count();
                                            $total = $reviews->count();
                                            $percentage = $rc/$total * 100;
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{$reviewStarCount->where('rating','4')->count()}}
                                    </div>
                                    <!-- end 4 -->
                                    <div class="col-xs-3 col-md-3 text-right">
                                        <span class="star">
                                            <span class="star">
                                                @for ($i = 0; $i < 3; $i++) <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 2; $i++) <i class="fa fa-star"></i>@endfor
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-8 col-md-7">
                                        <?php 
                                            $rc = $reviewStarCount->where('rating','3')->count();
                                            $total = $reviews->count();
                                            $percentage = $rc/$total * 100;
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{$reviewStarCount->where('rating','3')->count()}}
                                    </div>
                                    <!-- end 3 -->
                                    <div class="col-xs-3 col-md-3 text-right">
                                        <span class="star">
                                            <span class="star">
                                                @for ($i = 0; $i < 2; $i++) <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 3; $i++) <i class="fa fa-star"></i>@endfor
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xs-8 col-md-7">
                                        <?php 
                                            $rc = $reviewStarCount->where('rating','2')->count();
                                            $total = $reviews->count();
                                            $percentage = $rc/$total * 100;
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}">
                                                <span class="sr-only">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{$reviewStarCount->where('rating','2')->count()}}
                                    </div>
                                    <!-- end 2 -->
                                    <div class="col-xs-3 col-md-3 text-right">
                                        <span class="star">
                                            <span class="star">
                                                @for ($i = 0; $i < 1; $i++) <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 4; $i++) <i class="fa fa-star"></i>@endfor
                                            </span>
                                        </span> </div>
                                    <div class="col-xs-8 col-md-7">
                                        <?php 
                                            $rc = $reviewStarCount->where('rating','1')->count();
                                            $total = $reviews->count();
                                            $percentage = $rc/$total * 100;
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}">
                                                <span class="sr-only">15%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{$reviewStarCount->where('rating','1')->count()}}
                                    </div>
                                    <!-- end 1 -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="comment-list mt-4">
                            @foreach ($reviews as $review)
                            <li class="comment">
                                <div class="comment-body">
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
                                    <div class="meta">by {{$review->user->first_name}} {{$review->user->last_name}}
                                    </div>
                                    @if ($review->comment != NULL)
                                    <p class="text-dark">{{$review->comment}}</p>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
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
<script>
    function addToCartDetail(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.store')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                $('#add_to_cart_detail_'+product_id).addClass('hidden');
                $('#success_detail_'+product_id).removeClass('hidden');
                $("#qty_"+product_id).empty();
                $("#qty_"+product_id).append(1);
                $("#cart_items_count").html(response);
            }
        });
    }

    function cartIncrementDetail(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.increment')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                $("#qty_detail_"+product_id).empty();
                $("#qty_detail_"+product_id).val(response);
            }
        });
    }

    function cartDecrementDetail(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.decrement')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                $("#qty_detail_"+product_id).empty();
                $("#qty_detail_"+product_id).val(response);
            }
        });
    }
</script>
@endsection