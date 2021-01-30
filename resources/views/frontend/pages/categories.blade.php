@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Menu' : 'Speisekarte'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{route('getProductsByCategory',$category->id)}}" class="img-prod"><img class="img-fluid"
                            src="{{asset('storage/app/public/'.$category->image_url)}}" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{route('getProductsByCategory',$category->id)}}">@if (session('lan') == 'en')
                                {{$category->title}}
                                @else
                                {{$category->title_gr}}
                                @endif
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="float-right">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection