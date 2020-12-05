<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <button class="btn btn-outline-dark btn-border btn-sm dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user mr-2"></i>{{Auth::guard('admin')->user()->email}}
                </button>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                    </a>
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->