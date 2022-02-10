<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\Controllers\AppController@home')->name('home')->middleware('auth');
Route::get('/login', 'App\Http\Controllers\AppController@login')->name('login');
Route::get('/register', 'App\Http\Controllers\AppController@register')->name('register');
Route::get('/home', 'App\Http\Controllers\AppController@home')->name('home')->middleware('auth');
Route::get('/products', 'App\Http\Controllers\AppController@products')->name('home')->middleware('auth');

//Products
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('products.create')->middleware('auth');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products')->middleware('auth');
Route::get('/product/{id}/edit', 'App\Http\Controllers\ProductController@edit')->middleware('auth');
Route::post('/products/store', 'App\Http\Controllers\ProductController@store')->name('products.store')->middleware('auth');
Route::post('/products/update', 'App\Http\Controllers\ProductController@update')->name('products.update')->middleware('auth');
Route::post('/product/remove', 'App\Http\Controllers\ProductController@destroy')->name('products.remove')->middleware('auth');
Route::get('/product/{id}/show', 'App\Http\Controllers\ProductController@show')->middleware('auth');


//Orders
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders')->middleware('auth');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create')->middleware('auth');
Route::get('/order/{id}/edit', 'App\Http\Controllers\OrderController@edit')->middleware('auth');
Route::post('/orders/store', 'App\Http\Controllers\OrderController@store')->name('orders.store')->middleware('auth');
Route::post('/orders/update', 'App\Http\Controllers\OrderController@update')->name('orders.update')->middleware('auth');
Route::post('/order/remove', 'App\Http\Controllers\OrderController@destroy')->name('order.remove')->middleware('auth');

Route::post('/order/addProduct', 'App\Http\Controllers\OrderProductsController@store')->name('order.addProduct')->middleware('auth');
Route::post('/order/product/remove', 'App\Http\Controllers\OrderProductsController@destroy')->name('order.product.remove')->middleware('auth');

//LOGIN ROTAS
Route::post('/login/do', 'App\Http\Controllers\AuthController@Login')->name('login.do');
Route::get('logout', 'App\Http\Controllers\AuthController@Logout')->name('logout')->middleware('auth');

Route::post('/salvar-usuario', 'App\Http\Controllers\UserController@store')->name('salvar-usuario');
Route::get('/select2-users-ajax', 'App\Http\Controllers\UserController@listUsers');
