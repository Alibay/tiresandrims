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

Route::get('/register', 'AuthController@showRegisterForm')->name('register');
Route::post('/register', 'AuthController@register');
Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/poisk-diskov-po-avto/{brand?}/{model?}/{generation?}/{modification?}', 'Car\RimController@searchByCar')->name('rim-search-by-car');
Route::get('/poisk-diskov-po-parametram', 'Car\RimController@searchByParams')->name('rim-search-by-params');
Route::get('/poisk-shin-po-avto/{brand?}/{model?}/{generation?}/{modification?}', 'Car\TireController@searchByCar')->name('tire-search-by-car');
Route::get('/poisk-shin-po-parametram', 'HomeController@index')->name('tire-search-by-params');

Route::get('/products', 'Shop\ProductController@show')->name('products');

Route::get('/my-cars', 'UserController@myCars')->name('my-cars');
Route::get('/my-orders', 'UserController@myOrders')->name('my-orders');