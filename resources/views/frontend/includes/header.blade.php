<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text header-phone">031 558 33 88</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text header-email">hello@swaadbern.ch</span>
                    </div>
                    <div class="col-md-7 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text text-center">
                            <div style="text-align:left">
                                <?php  $site = App\SiteConfiguration::first(); ?> {!! $site->store_timing !!}
                            </div>
                        </span>
                        <span>
                            <div>
                                <form action="{{route('changeLanguage')}}" method="get" id="changeLanguageForm">
                                    @if (session('lan') == 'en')
                                    <select name="language" id="language">
                                        <option value="de">German</option>
                                        <option value="en" selected>English</option>
                                    </select>
                                    @else
                                    <select name="language" id="language">
                                        <option value="de" selected>German</option>
                                        <option value="en">English</option>
                                    </select>
                                    @endif
                                </form>
                            </div>
                        </span>
                        <span class="text text-center registration">
                            @if(Auth::guard('frontend')->check())
                            <a href="{{route('user.profile')}}" class="text-white">
                                {{ Auth::guard('frontend')->user()->name }}</a> | <a href="{{route('user.logout')}}"
                                class="text-white">{{session('lan') == 'en' ? 'Logout' : 'Ausloggen'}}</a>
                            @else
                            <a href="#" class="text-white" data-toggle="modal"
                                data-target="#loginModal">{{session('lan') == 'en' ? 'Login' : 'Anmeldung'}}</a> |
                            <a href="#" class="text-white" data-toggle="modal"
                                data-target="#registerModal">{{session('lan') == 'en' ? 'Register' : 'registrieren'}}</a>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{session('lan') == 'en' ? 'Menu' : 'Speisekarte'}}
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{(Route::currentRouteName() == 'products') ? 'active' : ''}}">
                    <a href="{{route('categories')}}"
                        class="nav-link">{{session('lan') == 'en' ? 'Order Online' : 'Online bestellen'}}</a></li>
                <li
                    class="nav-item dropdown {{(Route::currentRouteName() == 'getProductsByCategory') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">{{session('lan') == 'en' ? 'Menu' : 'Speisekarte'}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach (App\Category::where('status','1')->get() as $category)
                        <a class="dropdown-item" href="{{route('getProductsByCategory',$category->id)}}">
                            @if(session('lan') == 'en')
                            {{$category->title}}
                            @else
                            {{$category->title_gr}}
                            @endif</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item {{(Route::currentRouteName() == 'contact') ? 'active' : ''}}"><a
                        href="{{route('contact')}}"
                        class="nav-link">{{session('lan') == 'en' ? 'Contact' : 'Kontakt'}}</a></li>
                <li
                    class="nav-item dropdown {{(Route::currentRouteName() == 'reservation' || Route::currentRouteName() == 'privacy' || Route::currentRouteName() == 'about') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{session('lan') == 'en' ? 'More' : 'Mehr'}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item"
                            href="{{route('reservation')}}">{{session('lan') == 'en' ? 'Reservation' : 'Reservierung'}}</a>
                        <a class="dropdown-item"
                            href="{{route('privacy')}}">{{session('lan') == 'en' ? 'Privacy Policy' : 'Datenschutz-Bestimmungen'}}</a>
                        <a class="dropdown-item"
                            href="{{route('about')}}">{{session('lan') == 'en' ? 'About us' : 'Über uns'}}</a>
                    </div>
                </li>
                <li class="nav-item cta cta-colored"><a href="{{route('viewCart')}}" class="nav-link">
                        <span class="icon-shopping_cart"></span>[<span
                            id="cart_items_count">{{Cart::getContent()->count()}}</span>]
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">{{session('lan') == 'en' ? 'Login' : 'Anmeldung'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{session('lan') == 'en' ? 'E-Mail Address
                            ' : 'E-Mail-Addresse'}}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{session('lan') == 'en' ? 'Password' : 'Passwort'}}</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{session('lan') == 'en' ? 'Remember Me' : 'Behalte mich in Erinnerung'}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{session('lan') == 'en' ? 'Login' : 'Anmeldung'}} </button>
                            @if (Route::has('userPasswordRequest'))
                            <a class="btn btn-link" href="{{ route('userPasswordRequest') }}">
                                {{session('lan') == 'en' ? 'Forgot Your Password' : 'Haben Sie Ihr Passwort vergessen'}}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">
                    {{session('lan') == 'en' ? 'Registration' : 'Registrieren'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" container row">
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Username' : 'Nutzername'}}</label>
                        <input type="text" class="form-control" id="reg_username" name="username" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Email' : 'Email'}}</label>
                        <input type="email" class="form-control" id="reg_email" name="email" value="" placeholder=""
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Password' : 'Passwort'}}</label>
                        <input type="password" class="form-control" id="reg_password" name="password" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Phone' : 'Telefon'}}</label>
                        <input type="text" class="form-control" id="reg_phone" name="phone" value="" placeholder=""
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Street' : 'Straße'}}</label>
                        <input type="text" class="form-control" id="reg_address" name="address" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'House #' : 'Haus #'}}</label>
                        <input type="number" class="form-control" id="reg_house_no" name="house_no" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">{{session('lan') == 'en' ? 'Post code' : 'Postleitzahl'}}</label>
                        <input type="number" class="form-control" id="reg_post_code" name="post_code" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-primary float-right" onclick="registerUser()"
                            id="registerButton">{{session('lan') == 'en' ? 'Register' : 'Registrieren'}}</button>
                        <button class="btn btn-primary float-right hidden" id="loadingRegisterButton" type="button"
                            disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            {{session('lan') == 'en' ? 'Loading ... ' : 'Postleitzahl'}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function registerUser() {
        var username = $('#reg_username').val();
        var email = $('#reg_email').val();
        var password = $('#reg_password').val();
        var phone = $('#reg_phone').val();
        var address = $('#reg_address').val();
        var house_no = $('#reg_house_no').val();
        var post_code = $('#reg_post_code').val();

        $.ajax({
            method: "POST",
            url: '{{route('user.register.store')}}',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'username': username,
                'email': email,
                'password': password,
                'phone': phone,
                'address': address,
                'house_no': house_no,
                'post_code': post_code,
            },
            success: function (response) {
                if (response == 1) {
                    setInterval('location.reload()', 1000);
                    $("#registerButton").addClass("hidden");
                    $("#loadingRegisterButton").removeClass("hidden");
                }            
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        });
    }
</script>