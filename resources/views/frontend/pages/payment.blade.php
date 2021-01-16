@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">PAYMENT</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="text-dark text-center">
                <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
                @if ($paymentStatus == 1)
                <p class="text-success">Thank you for shopping with us. Your account has been charged and your
                    transaction is successful. We will be processing your order soon.</p>
                @else
                <p class="text-danger">Transaction cancel or fail. Please try again later.</p>
                @endif

                <a href="{{route('products')}}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
</section>

@endsection