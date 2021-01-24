@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="Colorlib Template">
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
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="float-right">
                    {{$products->links()}}
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