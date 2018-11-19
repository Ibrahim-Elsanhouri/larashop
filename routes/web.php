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
// Cart Routes
Route::get('/cart' , 'front\CartController@index')->name('mycart')->middleware('auth'); 
Route::post('/cart' , 'front\CartController@store')->name('cart.add')->middleware('auth'); 
Route::get('/empty', function(){
    Cart::instance('default')->destroy(); 
});
Route::delete('/cart/remove/{id}','front\CartController@remove')->name('cart.remove');
Route::get('/cart/savelater/{id}' ,'front\CartController@savelater' )->name('cart.savelater'); 
Route::delete('/saveLater/destroy/{id}','front\SaveforlaterController@destroy')->name('savelater.destroy');
Route::get('/cart/moveToCart/{id}','front\SaveforlaterController@moveToCart')->name('moveToCart');
Route::get('/checkout','front\CheckoutController@index'); 
Route::post('/checkouts','front\CheckoutController@store')->name('checkouts'); 