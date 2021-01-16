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
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$review->product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$review->product->image_url)}}" alt="">
                        <span class="status">{{$review->product->category->title}}</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('productDetail',$review->id)}}">{{$review->product->title}}</a></h3>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#viewReviewModal{{$review->id}}">
                                View Review
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="viewReviewModal{{$review->id}}" tabindex="-1"
                aria-labelledby="viewReviewModal{{$review->id}}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewReviewModal{{$review->id}}Label">My Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label for="">Rating <span class="text-danger">*</span></label>
                                <span class="star">
                                    <span class="star">
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$review['rating']) <i
                                            class="fa fa-star text-warning">
                                            </i>
                                            @else
                                            <span class="fa fa-star"></span>
                                            @endif
                                            @endfor
                                    </span>
                                </span>
                            </div>
                            <div class=" form-group col-md-12">
                                <label for="">Comments</label>
                                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"
                                    readonly>{{$review->comment}}</textarea>
                            </div>
                        </div>
                    </div>
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