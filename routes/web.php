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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search-rims-by-car', 'HomeController@index')->name('rim-search-by-car');
Route::get('/search-tires-by-car', 'HomeController@index')->name('tire-search-by-car');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

