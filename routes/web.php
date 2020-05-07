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

Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/index', 'FrontendController@index')->name('index');
Route::get('/product_list/{id}', 'FrontendController@product_list')->name('product_list');
Route::get('/cart/{id}', 'FrontendController@cart')->name('cart');

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
