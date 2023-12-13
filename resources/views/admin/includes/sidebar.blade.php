<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        <img src="{{asset('public/dashboard/dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{__('Swaad')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}"
                        class="nav-link {{(Route::currentRouteName() == 'admin.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (Auth::guard('admin')->user()->hasPermission('manage-admin-users'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'admins.create' || Route::currentRouteName() == 'admins.index'|| Route::currentRouteName() == 'admins.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'admins.create' || Route::currentRouteName() == 'admins.index' || Route::currentRouteName() == 'admins.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Admins
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'admins.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'admins.index' || Route::currentRouteName() == 'admins.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-customers'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'customers.create' || Route::currentRouteName() == 'customers.index'|| Route::currentRouteName() == 'customers.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'customers.create' || Route::currentRouteName() == 'customers.index' || Route::currentRouteName() == 'customers.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customers.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'customers.index' || Route::currentRouteName() == 'customers.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Customers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-categories'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'categories.create' || Route::currentRouteName() == 'categories.index'|| Route::currentRouteName() == 'categories.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'categories.create' || Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'categories.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-products'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'products.create' || Route::currentRouteName() == 'products.index'|| Route::currentRouteName() == 'products.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'products.create' || Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('products.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'products.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-orders'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'orders.create' || Route::currentRouteName() == 'orders.index'|| Route::currentRouteName() == 'orders.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'orders.create' || Route::currentRouteName() == 'orders.index' || Route::currentRouteName() == 'orders.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('orders.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'orders.index' || Route::currentRouteName() == 'orders.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif


                @if (Auth::guard('admin')->user()->hasPermission('manage-banners'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'banners.create' || Route::currentRouteName() == 'banners.index'|| Route::currentRouteName() == 'banners.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'banners.create' || Route::currentRouteName() == 'banners.index' || Route::currentRouteName() == 'banners.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Banners
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('banners.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'banners.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('banners.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'banners.index' || Route::currentRouteName() == 'banners.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Banners</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-codes'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'codes.create' || Route::currentRouteName() == 'codes.index'|| Route::currentRouteName() == 'codes.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'codes.create' || Route::currentRouteName() == 'codes.index' || Route::currentRouteName() == 'codes.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            Postal Codes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('codes.create')}}"
                                class="nav-link {{(Route::currentRouteName() == 'codes.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Postal Code</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('codes.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'codes.index' || Route::currentRouteName() == 'codes.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Postal Code</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-rsv'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'rsv.create' || Route::currentRouteName() == 'rsv.index'|| Route::currentRouteName() == 'rsv.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'rsv.create' || Route::currentRouteName() == 'rsv.index' || Route::currentRouteName() == 'rsv.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Reservations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('rsv.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'rsv.index' || Route::currentRouteName() == 'rsv.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Reservations</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('manage-reviews'))
                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'reviews.create' || Route::currentRouteName() == 'reviews.index'|| Route::currentRouteName() == 'reviews.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'reviews.create' || Route::currentRouteName() == 'reviews.index' || Route::currentRouteName() == 'reviews.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Reviews
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('reviews.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'reviews.index' || Route::currentRouteName() == 'reviews.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Reviews</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li
                    class="nav-item has-treeview {{(Route::currentRouteName() == 'gallery.create' || Route::currentRouteName() == 'gallery.index'|| Route::currentRouteName() == 'gallery.edit' ) ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'gallery.create' || Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('gallery.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'gallery.index' || Route::currentRouteName() == 'gallery.edit' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{(Route::currentRouteName() == 'coupons.index') ? 'menu-open' : ''}}">
                    <a href="#"
                        class="nav-link {{(Route::currentRouteName() == 'coupons.index' || Route::currentRouteName() == 'coupons.add' || Route::currentRouteName() == 'coupons.edit' ) ? 'active' : ''}}">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                        <p>
                            Coupons
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('coupons.index')}}"
                                class="nav-link {{(Route::currentRouteName() == 'coupons.index'  ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Coupons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('site-configuration.index')}}"
                        class="nav-link {{(Route::currentRouteName() == 'site-configuration.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Site Configuration
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>