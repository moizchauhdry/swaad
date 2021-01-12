@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">TO REVIEWS</h1>
            </div>
        </div>
    </div>
</div>

@if ($products->count() > 0)
<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('productDetail',$product->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$product->image_url)}}" alt="">
                        <span class="status">{{$product->category->title}}</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('productDetail',$product->id)}}">{{$product->title}}</a></h3>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                                Add Review
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{route('storeToReviews')}}" method="post"> @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <label for="">Rating <span class="text-danger">*</span></label>
                                    <span class="star">
                                        <div class="star-rating">
                                            <input type="radio" id="5-stars" name="rating" value="5" />
                                            <label for="5-stars" class="star">&#9733;</label>
                                            <input type="radio" id="4-stars" name="rating" value="4" />
                                            <label for="4-stars" class="star">&#9733;</label>
                                            <input type="radio" id="3-stars" name="rating" value="3" />
                                            <label for="3-stars" class="star">&#9733;</label>
                                            <input type="radio" id="2-stars" name="rating" value="2" />
                                            <label for="2-stars" class="star">&#9733;</label>
                                            <input type="radio" id="1-star" name="rating" value="1" />
                                            <label for="1-star" class="star">&#9733;</label>
                                        </div>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Comments</label>
                                    <textarea name="comment" id="comment" cols="30" rows="5"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit & Save</button>
                            </div>
                        </div>
                    </form>
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
            <p>There are no review products added yet.</p>
            <a href="{{route('products')}}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</section>
@endif


@endsection