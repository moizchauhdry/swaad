@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Reservation</span>
                </p>
                <h1 class="mb-0 bread">Reservation</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4 mb-4">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label for="">Date</label>
                    <input type="date" class="form-control" name="rsv_date" id="rsv_date" placeholder="">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection