@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Profile</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div style="padding: 35px">
        <div class="card-deck">
            <div class="card border-dark mb-3" style="max-width: 18rem; height:170px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-user" style="font-size: 80px"></i></h5>
                    <p class="card-text text-center"><a href="#">My Profile</a></p>
                </div>
            </div>
            <div class="card border-dark mb-3" style="max-width: 18rem; height:170px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="fas fa-list-ul" style="font-size: 80px"></i></h5>
                    <p class="card-text text-center"><a href="{{route('user.orders')}}">My Orders</a></p>
                </div>
            </div>
            <div class="card border-dark mb-3" style="max-width: 18rem; height:170px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-star" style="font-size: 80px"></i></h5>
                    <p class="card-text text-center"><a href="#">My Reviews</a></p>
                </div>
            </div>
            <div class="card border-dark mb-3" style="max-width: 18rem; height:170px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-comment-dots" style="font-size: 80px"></i></h5>
                    <p class="card-text text-center"><a href="#">To Reviews</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection