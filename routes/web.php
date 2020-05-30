<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

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

Auth::routes([  
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);
// Auth::routes();

Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/index', 'FrontendController@index')->name('index');
Route::get('/products', 'FrontendController@product_list')->name('product_list.v2');
Route::get('/products/{id}', 'FrontendController@product_list')->name('product_list');
Route::get('/cart/{id}', 'FrontendController@cart')->name('cart');

Route::get('/home', 'FrontendController@index')->name('home');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/privacy-policy', 'FrontendController@policy')->name('policy');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::get('/shopping-help', 'FrontendController@shopping_help')->name('shopping-help');
Route::get('/pengiriman-barang', 'FrontendController@pengiriman_barang')->name('pengiriman-barang');



Route::get('/admin', 'HomeController@index')->middleware(CheckRole::class)->name('admin');

Route::name('fe.')->group(function () {
	Route::get('fe/index', 'FrontendController@index')->name('index');

	Route::name('cart.')->group(function () {
		Route::post('fe/cart/store', 'Fe\CartController@store')->name('store');
		Route::get('fe/cart/index', 'Fe\CartController@index')->name('index');
		Route::get('fe/cart/show', 'Fe\CartController@show')->name('show');
		Route::get('fe/cart/destroy/{id}', 'Fe\CartController@destroy')->name('destroy');
		Route::post('fe/cart/update', 'Fe\CartController@update')->name('update');
	});

	Route::name('order.')->group(function () {
		Route::get('fe/order/store', 'Fe\OrderController@store')->name('store');
	});	

	Route::name('history.')->group(function () {
		Route::get('fe/history/index', 'Fe\OrderHistoryController@index')->name('index');
		Route::get('admin/history/show/{id}', 'Fe\OrderHistoryController@show')->name('show');		
	});		
});

Route::name('admin.')->group(function () {
	Route::name('product.')->group(function () {
		Route::get('admin/product/index', 'Admin\ProductController@index')->name('index');
		Route::get('admin/product/create', 'Admin\ProductController@create')->name('create');
		Route::post('admin/product/store', 'Admin\ProductController@store')->name('store');
		Route::get('admin/product/show/{id}', 'Admin\ProductController@show')->name('show');
		Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('edit');
		Route::post('admin/product/update/{id}', 'Admin\ProductController@update')->name('update');
		Route::post('admin/product/destroy/{id}', 'Admin\ProductController@destroy')->name('destroy');
	});

	Route::name('order.')->group(function () {
		Route::get('admin/order/index', 'Admin\OrderController@index')->name('index');
		Route::get('admin/order/create', 'Admin\OrderController@create')->name('create');
		Route::post('admin/order/store', 'Admin\OrderController@store')->name('store');
		Route::get('admin/order/show/{id}', 'Admin\OrderController@show')->name('show');
		Route::get('admin/order/edit/{id}', 'Admin\OrderController@edit')->name('edit');
		Route::post('admin/order/update/{id}', 'Admin\OrderController@update')->name('update');
		Route::post('admin/order/destroy/{id}', 'Admin\OrderController@destroy')->name('destroy');
	});	

	Route::name('order_status.')->group(function () {
		Route::get('admin/order_status/index', 'Admin\OrderStatusController@index')->name('index');
		Route::get('admin/order_status/create', 'Admin\OrderStatusController@create')->name('create');
		Route::post('admin/order_status/store', 'Admin\OrderStatusController@store')->name('store');
		Route::get('admin/order_status/show/{id}', 'Admin\OrderStatusController@show')->name('show');
		Route::get('admin/order_status/edit/{id}', 'Admin\OrderStatusController@edit')->name('edit');
		Route::post('admin/order_status/update/{id}', 'Admin\OrderStatusController@update')->name('update');
		Route::post('admin/order_status/destroy/{id}', 'Admin\OrderStatusController@destroy')->name('destroy');
	});		
});
