@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" style="padding: 25px">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-item nav-link active" href="#">Dashboard</a>
                <a class="nav-item nav-link" href="#">Profile</a>
                <a class="nav-item nav-link" href="#">Orders</a>
            </nav>
        </div>
    </div>
</div>
@endsection