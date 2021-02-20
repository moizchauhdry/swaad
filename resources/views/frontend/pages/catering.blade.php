@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">
                    {{session('lan') == 'en' ? 'Catering' : 'Gastronomie'}}
                </h1>
            </div>
        </div>
    </div>
</div>

@if (session('lan') == 'en')
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <p class="text-justify">
                We can also come to you with our catering service! We would be happy to advise you personally and
                individually on special requests for catering up to 200 people at your events. For your vacation,
                whether as a business lunch in your company or for private occasions, we deliver food and drinks from
                our standard range. On request, we will be happy to put together an individual menu for you. Service
                personnel can also be provided by us.
            </p>
            <p class="text-justify">
                We are happy to advise you personally and individually on special requests.
            </p>
        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span> {{session('lan') == 'en' ? 'Address:' : 'Adresse:'}}
                        </span> Bernstrasse 95 <br> Bernstraße 95 <br> Ostermundigen, Switzerland</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Phone:' : 'Telefon:'}}</span> <a href="tel://0315583388">
                            031-558-33-88</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Email:' : 'Email:'}}</span> <a
                            href="mailto:info@yoursite.com">hello@swaadbern.ch</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Website:' : 'Webseite:'}}</span> <a
                            href="{{route('index')}}">swaadbern.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <p class="text-justify">
                «Swaad» gibt es nicht nur im Restaurant, wir bringen den Geschmack auch
                direkt zu Ihnen nachhause.
                Ob geschäftlich oder privat, unser Catering-Service ist eine Corona-konforme
                Lösung, falls Sie nicht zu uns kommen können oder möchten.
                Für Firmen: Ob regelmässiges Business-Lunch bei Ihnen im Betrieb oder für
                grössere Anlässe, wir sind ihr zuverlässiger Partner in Sachen Geschmack!
                Gerne beraten wir Sie individuell.
                Für Privat: Ob Hunger im Home-Office, für den grossen Familien-Besuch oder
                für feierliche Anlässe mit bis zu 200 Personen, wir beliefern Sie gerne!
            </p>
            <p class="text-justify">
                Kontaktieren Sie uns! Wir liefern alle Standard-Menüs und Getränke im
                Catering zu Ihnen. Gerne beraten wie Sie auch und stellen ein individuelles
                Menü genau nach Ihren Wünschen zusammen.
            </p>
        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span> {{session('lan') == 'en' ? 'Address:' : 'Adresse:'}}
                        </span> <br> Swaad Foods Gmbh <br> 3072 Ostermundigen</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Phone:' : 'Telefon:'}}</span> <a href="tel://0315583388">
                            031-558-33-88</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Email:' : 'Email:'}}</span> <a
                            href="mailto:info@yoursite.com">hello@swaadbern.ch</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>{{session('lan') == 'en' ? 'Website:' : 'Webseite:'}}</span> <a
                            href="{{route('index')}}">swaadbern.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection