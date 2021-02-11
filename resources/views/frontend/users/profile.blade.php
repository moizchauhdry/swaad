@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Profile' : 'Profil'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="card-deck">
            <div class="card shadow border-light mb-3" style="max-width: 18rem; height:130px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-user"
                            style="font-size: 50px; color:#f45318; color:#f45318"></i>
                    </h5>
                    <p class="card-text text-center">
                        <a data-target="#profileModal" data-toggle="modal" class="MainNavText" id="MainNavHelp"
                            href="#profileModal">{{session('lan') == 'en' ? 'Profile' : 'Profil'}}</a>
                    </p>
                </div>
            </div>
            <div class="card shadow border-light mb-3" style="max-width: 18rem; height:130px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="fas fa-list-ul"
                            style="font-size: 50px; color:#f45318"></i>
                    </h5>
                    <p class="card-text text-center"><a
                            href="{{route('user.orders')}}">{{session('lan') == 'en' ? 'My Orders' : 'Meine Bestellungen'}}</a>
                    </p>
                </div>
            </div>
            <div class="card shadow border-light mb-3" style="max-width: 18rem; height:130px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-star"
                            style="font-size: 50px; color:#f45318"></i>
                    </h5>
                    <p class="card-text text-center"><a
                            href="{{route('myReviews')}}">{{session('lan') == 'en' ? 'My Reviews' : 'Meine Bewertungen'}}</a>
                    </p>
                </div>
            </div>
            <div class="card shadow border-light mb-3" style="max-width: 18rem; height:130px">
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><i class="far fa-comment-dots"
                            style="font-size: 50px; color:#f45318"></i></h5>
                    <p class="card-text text-center"><a
                            href="{{route('toReviews')}}">{{session('lan') == 'en' ? 'To Reviews' : 'Zu Bewertungen'}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{route('updateProfile',$user->id)}}" method="POST"> @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">
                        {{session('lan') == 'en' ? 'Update Profile' : 'Profil aktualisieren'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" container row">
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'First Name' : 'Vorname'}}</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                value="{{$user->first_name}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'Last Name' : 'Nachname'}}</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                value="{{$user->last_name}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'Email' : 'Email'}}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'Phone' : 'Telefon'}}</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone_no}}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'Address' : 'Adresse'}}</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{$user->address}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'House #' : 'Haus #'}}</label>
                            <input type="text" class="form-control" id="house_no" name="house_no"
                                value="{{$user->home_no}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'City' : 'Stadt'}}</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">{{session('lan') == 'en' ? 'Post code' : 'Postleitzahl'}}</label>
                            <input type="text" class="form-control" id="post_code" name="post_code"
                                value="{{$user->zip_code}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn btn-primary btn-sm">{{session('lan') == 'en' ? 'Save and update' : 'Speichern und aktualisieren'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection