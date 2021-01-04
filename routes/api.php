<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User authentication
Route::group(['prefix' => 'user'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/signIn', 'Api\AuthController@login');
        Route::post('/signUp', 'Api\AuthController@signUp');
        Route::post('/forgotPassword', 'Api\AuthController@forgotPassword');
    });


    //////  Reservations
    Route::post('/addReservation', 'Api\ReservationController@addReservation');

    Route::middleware(['authuser'])->group(function () {
        Route::post('/signOut', 'Api\AuthController@logout');
        Route::post('/updateProfile', 'Api\AuthController@updateProfile');

        //////Categories
        Route::post('/allCategories', 'Api\CategoryController@allCategories');

        //// Products
        Route::post('/getPopularProducts', 'Api\ProductController@getPopularProducts');
        Route::post('/getProductByCategory', 'Api\ProductController@getProductByCategory');
        Route::post('/addViewCount', 'Api\ProductController@addViewCount');

        //// Orders
        Route::post('/placeOrder', 'Api\OrderController@placeOrder');
        Route::post('/getMyOrders', 'Api\OrderController@getMyOrders');
        Route::post('/orderDetails', 'Api\OrderController@orderDetails');

        //////////// Banner
        Route::post('/getHomeBanner', 'Api\BannerController@getHomeBanner');
        Route::post('/getReservationBanner', 'Api\BannerController@getReservationBanner');


        //// Review
        Route::post('/addReview', 'Api\ReviewController@addReview');
        Route::post('/getMyReviews', 'Api\ReviewController@getMyReviews');
        Route::post('/getToReviews', 'Api\ReviewController@getToReviews');

        ///PostCode
        Route::post('/checkPostalCode', 'Api\PostalCodeController@checkPostalCode');

    });

});
