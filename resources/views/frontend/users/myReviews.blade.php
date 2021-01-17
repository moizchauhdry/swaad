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

@if ($reviews->count() > 0)
<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($reviews as $review)
            <div class="media p-4">
                <img src="{{asset('storage/app/public/'.$review->product->image_url)}}" class="mr-4 w-25">
                <div class=" media-body">
                    <h5 class="mt-0"><a
                            href="{{route('productDetail',$review->product->id)}}">{{$review->product->category->title}}</a>
                    </h5>
                    <span class="star">
                        <span class="star">
                            @for ($i = 1; $i <= 5; $i++) @if($i <=$review['rating']) <i class="fa fa-star text-warning">
                                </i>
                                @else
                                <span class="fa fa-star"></span>
                                @endif
                                @endfor
                        </span>
                    </span>
                    @if ($review->comment != NULL)
                    <p>{{ Str::limit($review->comment, 100) }}</p>
                    @endif
                    <span>By {{$review->user->name}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<section class="ftco-section">
    <div class="col-md-8 offset-md-2">
        <div class="text-dark text-center mb-3">
            <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
            <p>There are no reviews added yet.</p>
            <a href="{{route('products')}}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</section>
@endif



@endsection