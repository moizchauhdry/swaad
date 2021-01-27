@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">
                    {{session('lan') == 'en' ? 'Forgot Password' : 'Passwort vergessen'}}
                </h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section">
    <div class="col-md-6 offset-md-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('userPasswordEmail') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-area">
                <div class="form-fields">
                    <h2>{{ __('Reset Password') }}</h2>
                    <p>
                        {{ __('E-Mail Address') }} <span style="color: red">*</span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </p>
                </div>
                <div class="form-action fix">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
        </form>
    </div>
</section>
</div>

@endsection