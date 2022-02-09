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
//LOGIN ROTAS
Route::post('/login/do', 'App\Http\Controllers\AuthController@Login')->name('login.do');
Route::get('logout', 'App\Http\Controllers\AuthController@Logout')->name('logout')->middleware('auth');

Route::post('/salvar-usuario', 'App\Http\Controllers\UserController@store')->name('salvar-usuario');
