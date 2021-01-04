@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">MY REVIEWS</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="col-md-8 offset-md-2">
        <div class="text-dark text-center mb-3">
            <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
            <p>There are no reviews added yet.</p>
            <a href="{{route('products')}}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</section>

@endsection