<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','front\HomeController@index');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard','DashboardController@index')->middleware('auth');
    Route::resource('/products', 'ProductController')->middleware('auth');;
    Route::resource('/orders', 'OrderController')->middleware('auth');;
    Route::resource('/users', 'UserController')->middleware('auth');;
    Route::get('/orders/enable/{id}' ,'UserController@enable')->name('users.enable')->middleware('auth');;
    Route::get('/orders/disable/{id}' ,'UserController@disable')->name('users.disable')->middleware('auth');;
    Route::get('/orders/confirm/{id}' ,'OrderController@confirm')->name('orders.confirm')->middleware('auth');;
    Route::get('/orders/pending/{id}' ,'OrderController@pending')->name('orders.pending')->middleware('auth');;
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/profile' , 'front\UserProfileController@index')->name('users.profile');
Route::get('user/order/{id}' , 'front\UserProfileController@show')->name('users.order');
