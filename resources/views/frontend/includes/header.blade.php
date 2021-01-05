<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text header-phone">+ 031 558 33 88</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text header-email">hello@swaadbern.ch</span>
                    </div>
                    <div class="col-md-7 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text text-center">
                            <div class="float-left">
                                <b>Tuesday-Friday </b> (10:00 - 22:30) <br>
                            </div>
                            <div class="float-left">
                                <b>Monday </b> (10:00 - 14:00) <br>
                            </div>
                            <div class="float-left">
                                <b>Saturday </b> (17:00 - 22:30) <br>
                            </div>
                            <div class="float-left">
                                <b>Sunday Closed</b>
                            </div>
                        </span>
                        <span class="text text-center">
                            <div id="google_translate_element"></div>
                        </span>
                        <span class="text text-center registration">
                            @if(Auth::guard('frontend')->check())
                            <a href="{{route('user.profile')}}" class="text-white">
                                {{ Auth::guard('frontend')->user()->name }}</a> | <a href="{{route('user.logout')}}"
                                class="text-white">Logout</a>
                            @else
                            <a href="#" class="text-white" data-toggle="modal" data-target="#loginModal">Login</a> |
                            <a href="#" class="text-white" data-toggle="modal"
                                data-target="#registerModal">Registration</a>
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
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{(Route::currentRouteName() == 'products') ? 'active' : ''}}">
                    <a href="{{route('products')}}" class="nav-link">Order Online</a></li>
                <li
                    class="nav-item dropdown {{(Route::currentRouteName() == 'getProductsByCategory') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach (App\Category::where('status','1')->get() as $category)
                        <a class="dropdown-item"
                            href="{{route('getProductsByCategory',$category->id)}}">{{$category->title}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item {{(Route::currentRouteName() == 'contact') ? 'active' : ''}}"><a
                        href="{{route('contact')}}" class="nav-link">Contact</a></li>
                <li
                    class="nav-item dropdown {{(Route::currentRouteName() == 'reservation' || Route::currentRouteName() == 'privacy' || Route::currentRouteName() == 'about') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('reservation')}}">Reservation</a>
                        <a class="dropdown-item" href="{{route('privacy')}}">Privacy Policy</a>
                        <a class="dropdown-item" href="{{route('about')}}">About Us</a>
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
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            {{-- {{ route('password.request') }} --}}
                            <a class="btn btn-link" href="#">
                                {{ __('Forgot Your Password?') }}
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
                <h5 class="modal-title" id="registerModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" container row">
                    <div class="form-group col-md-6">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" id="reg_username" name="username" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="reg_email" name="email" value="" placeholder=""
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="password" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" id="reg_phone" name="phone" value="" placeholder=""
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Street</label>
                        <input type="text" class="form-control" id="reg_address" name="address" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">House Number</label>
                        <input type="number" class="form-control" id="reg_house_no" name="house_no" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Post Code</label>
                        <input type="number" class="form-control" id="reg_post_code" name="post_code" value=""
                            placeholder="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-primary float-right" onclick="registerUser()"
                            id="registerButton">Register</button>
                        <button class="btn btn-primary float-right hidden" id="loadingRegisterButton" type="button"
                            disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
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