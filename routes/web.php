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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard','DashboardController@index');
Route::resource('/products', 'ProductController');
Route::resource('/orders', 'OrderController');
Route::resource('/users', 'UserController');
Route::get('/orders/enable/{id}' ,'UserController@enable')->name('users.enable');
Route::get('/orders/disable/{id}' ,'UserController@disable')->name('users.disable');
Route::get('/orders/confirm/{id}' ,'OrderController@confirm')->name('orders.confirm');
Route::get('/orders/pending/{id}' ,'OrderController@pending')->name('orders.pending');