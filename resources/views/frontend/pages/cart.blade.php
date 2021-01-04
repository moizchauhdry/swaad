@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">My Cart</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        @if (Cart::getContent()->count() > 0)
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $product)
                            <tr class="text-center">

                                <td class="product-name">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->description}}</p>
                                </td>

                                <td class="price"> CHF {{ number_format((float)$product->price, 2, '.', '')}}</td>

                                <td class="quantity">
                                    x {{$product->quantity}}
                                </td>

                                <td class="total">
                                    CHF {{ $product->price * $product->quantity}}
                                </td>

                                <td class="product-remove"><a href="#"
                                        onclick="removeFromCart('{{$product->id}}')"><span
                                            class="ion-ios-close"></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span> CHS {{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>CHS 0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>CHS 0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>CHS {{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                    </p>
                </div>
                <p><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
        @else
        <div class="col-md-8 offset-md-2">
            <div class="text-dark text-center">
                <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
                <p>There are no items in this cart.</p>
                <a href="{{route('products')}}" class="btn btn-primary">Continue Shopping</a>
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
</script>
@endsection