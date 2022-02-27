@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">
                    {{session('lan') == 'en' ? 'Gallery' : 'Galerie'}}
                </h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row">
            @foreach ($gallery as $image)
            <div class="col-md-4 mb-4">
                <img src="{{ asset('storage/app/public/'.$image->image_url) }}" alt="..." class="rounded w-100 h-100">
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
