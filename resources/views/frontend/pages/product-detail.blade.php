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
                        src="{{asset('storage/app/public/'.$product->image_url)}}" class="img-fluid"
                        alt="Colorlib Template"></a>
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
                    <span> € {{ number_format((float)$product->price, 2, '.', '')}}</span>
                </p>
                <p>
                    {{$product->description}}
                </p>
                <div class="row mt-4">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                            min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex mb-3">
                        <button onclick="addToCart('{{$product->id}}')" class="btn btn-primary btn-lg" style="color: white;
                            background-color: #f45318 !important; width:100%">Add to
                            Cart</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<section class=" ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Products</span>
                <h2 class="mb-4">Related Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="product-image">
                        <span class="status">{{$product->category->title}}</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('productDetail',$product->id)}}">{{$product->title}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span class="price-sale">$80.00</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            {{-- <div class="m-auto d-flex">
                                <a href="#"
                                    class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div> --}}
                            <div class="m-auto d-flex">
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
                $("#success_"+product_id).append('Item Added To Cart');
            }
        });
    }
</script>

@endsection