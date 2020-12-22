@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Reservation</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4 text-center">
            @if(session()->has('SUCCESS'))
            <div class="alert alert-success">
                {{ session()->get('SUCCESS') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4 mb-4">
            <form action="{{route('reservation.store')}}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="rsv_date" id="rsv_date" placeholder=""
                            value="{{date("Y-m-d")}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Time</label>
                        <input type="time" class="form-control" name="rsv_time" id="rsv_time" placeholder=""
                            value="{{date("h:i",strtotime('+5 hours'))}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">People <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('rsv_people') is-invalid @enderror"
                            name="rsv_people" id="rsv_people" placeholder="" required>
                        @error('rsv_people')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('rsv_name') is-invalid @enderror" name="rsv_name"
                            id="rsv_name" placeholder="" required>
                        @error('rsv_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('rsv_email') is-invalid @enderror"
                            name="rsv_email" id="rsv_email" placeholder="" required>
                        @error('rsv_email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('rsv_phone') is-invalid @enderror"
                            name="rsv_phone" id="rsv_phone" placeholder="" required>
                        @error('rsv_phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Message <span class="text-danger">*</span></label>
                        <textarea name="rsv_message" id="rsv_message" cols="30" rows="5"
                            class="form-control @error('rsv_message') is-invalid @enderror" required></textarea>
                        @error('rsv_message')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection