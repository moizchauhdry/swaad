<?php

use Illuminate\Support\Facades\Route;

/**
 *****************************************************************************
 ************************** FRONTEND ROUTES *******************************
 *****************************************************************************
*/

Route::get('/', 'Frontend\FrontendController@index')->name('index');


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
                        Route::post('/store', 'CustomerController@store')->name('customers.store');
                        Route::get('/edit/{id}', 'CustomerController@edit')->name('customers.edit');
                        Route::post('/update/{id}', 'CustomerController@update')->name('customers.update');
                        Route::post('/deactivate', 'CustomerController@destroy')->name('customers.delete');
                        Route::get('/deleted', 'CustomerController@deleted')->name('customers.deleted');
                        Route::post('/activate', 'CustomerController@activate')->name('customers.activate');
                        Route::post('/search', 'CustomerController@search')->name('customers.search');

                        Route::get('/edit/address/{id}', 'CustomerController@editAddress')->name('customers.edit.address');
                        Route::post('/update/address/{id}', 'CustomerController@updateAddress')->name('customers.update.address');
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

            });
        });
    });
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
