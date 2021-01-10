<?php

use Illuminate\Support\Facades\Route;

/**
 *****************************************************************************
 ************************** FRONTEND ROUTES **********************************
 *****************************************************************************
*/

Route::group(['prefix'=>'user'],function() {
    Route::post('/login','Frontend\FrontendController@login')->name('user.login');
    Route::get('/logout','Frontend\FrontendController@logout')->name('user.logout');
    Route::post('/register','Frontend\FrontendController@register')->name('user.register.store');
});

Route::get('/', 'Frontend\FrontendController@index')->name('index');

Route::post('/addToCart', 'Frontend\FrontendController@addToCart')->name('addToCart');
Route::get('/add-to-cart', 'Frontend\FrontendController@viewCart')->name('viewCart');
Route::get('/cart', 'Frontend\CartController@index')->name('cart.index');
Route::post('/cart/store', 'Frontend\CartController@store')->name('cart.store');
Route::post('/cart/destroy','Frontend\CartController@destroy')->name('cart.destroy');
Route::post('/cart/decrement','Frontend\CartController@decrement')->name('cart.decrement');
Route::post('/cart/increment','Frontend\CartController@increment')->name('cart.increment');

Route::group(['middleware' => ['frontend']],function(){
    Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
    Route::post('/checkout/store', 'Frontend\CheckoutController@store')->name('checkout.store');

    Route::group(['prefix'=>'user'],function() {
        Route::get('/profile','Frontend\UserController@profile')->name('user.profile');
        Route::post('/profile/update/{id}','Frontend\UserController@updateProfile')->name('updateProfile');
        Route::get('/orders','Frontend\UserController@orders')->name('user.orders');
        Route::post('/getOrdersByStatus','Frontend\UserController@getOrdersByStatus')->name('getOrdersByStatus');
        Route::get('/order-detail/{id}','Frontend\UserController@orderDetail')->name('orderDetail');
        Route::get('/my-reviews','Frontend\UserController@myReviews')->name('myReviews');
        Route::get('/to-reviews','Frontend\UserController@toReviews')->name('toReviews');
        Route::post('/to-reviews/store','Frontend\UserController@storeToReviews')->name('storeToReviews');
    });
});

Route::get('/categories', 'Frontend\FrontendController@categories')->name('categories');
Route::get('/getProductsByCategory/{id}', 'Frontend\FrontendController@getProductsByCategory')->name('getProductsByCategory');

Route::get('/products', 'Frontend\FrontendController@products')->name('products');
Route::get('/products/detail/{id}', 'Frontend\FrontendController@productDetail')->name('productDetail');

Route::get('/reservation', 'Frontend\FrontendController@reservation')->name('reservation');
Route::post('/reservation/store', 'Frontend\FrontendController@storeReservation')->name('reservation.store');

Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');
Route::post('/contact/store', 'Frontend\FrontendController@storeContact')->name('contact.store');

Route::get('/about', 'Frontend\FrontendController@about')->name('about');
Route::get('/serve', 'Frontend\FrontendController@serve')->name('serve');
Route::get('/privacy', 'Frontend\FrontendController@privacy')->name('privacy');
Route::get('/termsCondition', 'Frontend\FrontendController@termsCondition')->name('termsCondition');

// SIX PAYMENT METHOD
Route::get('/six-payment', 'Frontend\CheckoutController@sixPayment');
Route::get('/payment-success', 'Frontend\CheckoutController@paymentSuccess');
Route::get('/payment-fail', 'Frontend\CheckoutController@paymentFail');

/**
 *****************************************************************************
 ************************** ADMIN PANEL ROUTES *******************************
 *****************************************************************************
*/
Route::group(['middleware' => 'prevent-back-history'], function()
{
    Route::get('/dashboard', function () {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    });

    Route::prefix('admin')->group(function()
    {
        Route::match(['get','post'],'/','AdminController@login')->name('admin.login');

        Route::group(['middleware' => ['adminCheckSuspend']],function()
        {
            Route::group(['middleware' => ['admin']],function()
            {
                Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
                Route::get('/logout', 'AdminController@logout')->name('admin.logout');

                Route::group(['middleware' => ['permission:manage-admin-users']],function(){
                    Route::group(['prefix' => 'admin-users'],function(){
                        Route::get('/', 'AdminUserController@index')->name('admins.index');
                        Route::get('/create', 'AdminUserController@create')->name('admins.create');
                        Route::post('/store', 'AdminUserController@store')->name('admins.store');
                        Route::get('/edit/{id}', 'AdminUserController@edit')->name('admins.edit');
                        Route::post('/update/{id}', 'AdminUserController@update')->name('admins.update');
                    });
                });

                Route::group(['middleware' => ['permission:manage-customers']],function(){
                    Route::group(['prefix' => 'customers'],function(){
                        Route::get('/', 'CustomerController@index')->name('customers.index');
                        Route::post('/suspend-account', 'CustomerController@customerSuspendAccount')->name('customerSuspendAccount');
                    });
                });

                Route::group(['middleware' => ['permission:manage-categories']],function(){
                    Route::group(['prefix' => 'menu'],function(){
                        Route::get('/', 'CategoryController@index')->name('categories.index');
                        Route::get('/create', 'CategoryController@create')->name('categories.create');
                        Route::post('/store', 'CategoryController@store')->name('categories.store');
                        Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
                        Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
                    });
                });

                Route::group(['middleware' => ['permission:manage-products']],function(){
                    Route::group(['prefix' => 'products'],function(){
                        Route::get('/', 'ProductController@index')->name('products.index');
                        Route::get('/create', 'ProductController@create')->name('products.create');
                        Route::post('/store', 'ProductController@store')->name('products.store');
                        Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
                        Route::post('/update/{id}', 'ProductController@update')->name('products.update');
                    });
                });

                Route::group(['middleware' => ['permission:manage-orders']],function(){
                    Route::group(['prefix' => 'orders'],function(){
                        Route::get('/', 'OrderController@index')->name('orders.index');
                        Route::get('/detail/{id}', 'OrderController@detail')->name('orders.detail');
                        Route::post('/updateOrderStatus/{id}', 'OrderController@updateOrderStatus')->name('updateOrderStatus');
                    });
                });

                Route::group(['middleware' => ['permission:manage-banners']], function () {
                    Route::group(['prefix' => 'banner'], function () {
                        Route::get('/', 'BannerController@index')->name('banners.index');
                        Route::get('/create', 'BannerController@create')->name('banners.create');
                        Route::post('/store', 'BannerController@store')->name('banners.store');
                        Route::get('/edit/{id}', 'BannerController@edit')->name('banners.edit');
                        Route::post('/update/{id}', 'BannerController@update')->name('banners.update');
                        Route::post('/delete', 'BannerController@destroy')->name('banners.delete');
                    });
                });

                Route::group(['middleware' => ['permission:manage-codes']], function () {
                    Route::group(['prefix' => 'postal-code'], function () {
                        Route::get('/', 'PostalCodeController@index')->name('codes.index');
                        Route::get('/create', 'PostalCodeController@create')->name('codes.create');
                        Route::post('/store', 'PostalCodeController@store')->name('codes.store');
                        Route::get('/edit/{id}', 'PostalCodeController@edit')->name('codes.edit');
                        Route::post('/update/{id}', 'PostalCodeController@update')->name('codes.update');
                        Route::get('/delete', 'PostalCodeController@destroy')->name('codes.delete');
                    });
                });

                Route::group(['middleware' => ['permission:manage-rsv']],function(){
                    Route::group(['prefix' => 'rsv'],function(){
                        Route::get('/', 'ReservationController@index')->name('rsv.index');
                    });
                });

                Route::group(['middleware' => ['permission:manage-reviews']],function(){
                    Route::group(['prefix' => 'reviews'],function(){
                        Route::get('/', 'ReviewController@index')->name('reviews.index');
                        Route::post('/approve/{id}', 'ReviewController@approveReview')->name('approveReview');
                    });
                });

            });
        });
    });
});

/////For user reset Password routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/password/reset/', 'Auth\UserResetPasswordController@reset')->name('resetPasswordUser');
Route::get('/user/password/reset/{token}', 'Auth\UserResetPasswordController@showResetForm')->name('userPasswordReset');
