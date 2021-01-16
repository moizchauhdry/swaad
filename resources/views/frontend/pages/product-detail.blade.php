@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Product Detail</h1>
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
                <h3>{{$product->title}}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                </div>
                <p class="price">
                    <span> CHF {{ number_format((float)$product->price, 2, '.', '')}}</span>
                </p>
                <p>
                    {{$product->description}}
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
                <span class="subheading">Products</span>
                <h2 class="mb-4">Related Products</h2>
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
                        <span class="status">{{$product->category->title}}</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('productDetail',$product->id)}}">{{$product->title}}</a></h3>
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