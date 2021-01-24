@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">
                    {{session('lan') == 'en' ? 'Contact us' : 'Kontaktiere uns'}}
                </h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span> {{session('lan') == 'en' ? 'Address:' : 'Adresse:'}}
                        </span> Bernstrasse 95, Ostermundigen, Switzerland</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>{{session('lan') == 'en' ? 'Phone:' : 'Telefon:'}}</span> <a href="tel://0315583388">
                            031-558-33-88</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>{{session('lan') == 'en' ? 'Email:' : 'Email:'}}</span> <a
                            href="mailto:info@yoursite.com">hello@swaadbern.ch</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>{{session('lan') == 'en' ? 'Website:' : 'Webseite:'}}</span> <a
                            href="{{route('index')}}">swaadbern.com</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="{{route('contact.store')}}" method="POST" class="bg-white p-5 contact-form"> @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"
                            placeholder="{{session('lan') == 'en' ? 'Your Name' : 'Dein Name'}}" name="ct_name"
                            required>
                        @error('ct_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control"
                            placeholder="{{session('lan') == 'en' ? 'Your Email' : 'Deine E-Mail'}}" name="ct_email"
                            required>
                        @error('ct_email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"
                            placeholder="{{session('lan') == 'en' ? 'Subject' : 'Gegenstand'}}" name="ct_subject"
                            required>
                        @error('ct_subject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="ct_message" id="ct_message" cols="30" rows="7" class="form-control"
                            placeholder="{{session('lan') == 'en' ? 'Message' : 'Botschaft'}}" required></textarea>
                        @error('ct_message')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{session('lan') == 'en' ? 'Send Message' : 'Nachricht senden'}}"
                            class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection