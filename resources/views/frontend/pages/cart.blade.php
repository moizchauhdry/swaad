@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread"> {{session('lan') == 'en' ? 'My Cart' : 'Mein Warenkorb'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        @if (Cart::getContent()->count() > 0)
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled">
                    @foreach (Cart::getContent() as $item)
                    <?php
                        $product = App\Product::where('id',$item->id)->first();
                    ?>
                    <li class="media">
                        <img src="{{asset('storage/app/public/'.$product->image_url)}}" class="mr-3 w-25" alt="...">
                        <div class="media-body">
                            @if (session('lan') == 'en')
                            <h5 class="mt-0 mb-1">{{$product->title}}</h5>
                            {{$product->description}} <br>
                            @else
                            <h5 class="mt-0 mb-1">{{$product->title_gr}}</h5>
                            {{$product->description_gr}} <br>
                            @endif
                            <b>Quantity :</b> x {{$item->quantity}} <br>
                            <b>Price :</b> CHF {{ $item->price * $item->quantity}} <br>
                            <a href="#" class="text-danger float-right" onclick="removeFromCart('{{$product->id}}')">
                                <span class="ion-ios-close"></span>&nbsp;Remove</a>
                        </div>
                    </li>
                    <hr>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <div class="cart-total mb-3">
                    <h3> {{session('lan') == 'en' ? 'Cart Totals' : 'Warenkorbsummen'}}</h3>
                    <p class="d-flex">
                        <span> {{session('lan') == 'en' ? 'Subtotal' : 'Zwischensumme'}}</span>
                        <span> CHF {{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                    </p>
                    <p class="d-flex">
                        <span> {{session('lan') == 'en' ? 'Delivery' : 'Lieferung'}}</span>
                        <span>CHF 0.00</span>
                    </p>
                    <p class="d-flex">
                        <span> {{session('lan') == 'en' ? 'Discount' : 'Rabatt'}}</span>
                        <span>CHF 0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span> {{session('lan') == 'en' ? 'Total' : 'Gesamt'}}</span>
                        <span>CHF {{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                    </p>
                </div>
                <p class="text-center">
                    <a href="{{route('checkout')}}"
                        class="btn btn-primary py-3 px-4">{{session('lan') == 'en' ? 'Proceed to Checkout' : 'Zur Kasse'}}
                    </a>
                </p>
            </div>
        </div>
        @else
        <div class="col-md-8 offset-md-2">
            <div class="text-dark text-center">
                <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
                <p> {{session('lan') == 'en' ? 'There are no items in this cart.' : 'In diesem Warenkorb befinden sich keine Artikel.'}}
                </p>
                <a href="{{route('products')}}" class="btn btn-primary">
                    {{session('lan') == 'en' ? 'Continue Shopping' : 'Mit dem Einkaufen fortfahren'}}
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@section('scripts')
<script>
    function removeFromCart(product_id) {
        $.ajax({
            method: "POST",
            url: '{{route('cart.destroy')}}',
            data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id,
            },
            success: function (response) {
                location.reload();
            }
        });
    }

    $(function () {
        $("#cartTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "searching":false,
            "paging":   false,
            "ordering": false,
            "info":     false
        });
    });
</script>
@endsection