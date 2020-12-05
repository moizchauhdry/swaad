<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">swaad@info.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">20 - 40 Minutes delivery</span>
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
                <li class="nav-item active"><a href="#" class="nav-link">Order Online</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach (App\Category::where('status','1')->get() as $category)
                        <a class="dropdown-item" href="#">{{$category->title}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Catering</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Reservation</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="#">Birthday</a>
                        <a class="dropdown-item" href="#">Anniversary</a>
                        <a class="dropdown-item" href="#">Privacy Policy</a>
                        <a class="dropdown-item" href="#">About Us</a>
                    </div>
                </li>
                <li class="nav-item cta cta-colored"><a href="#" class="nav-link"><span
                            class="icon-shopping_cart"></span>[0]</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->