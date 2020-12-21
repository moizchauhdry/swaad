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

        //// Orders
        Route::post('/placeOrder', 'Api\OrderController@placeOrder');


    });

});
