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
Route::get('/c/{id}', 'FrontendController@product_list')->name('product_list');
Route::get('/p/{id}', 'FrontendController@cart')->name('cart');
Route::get('/promo', 'FrontendController@promo')->name('promo');

Route::get('/home', 'FrontendController@index')->name('home');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/privacy-policy', 'FrontendController@policy')->name('policy');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::get('/shopping-help', 'FrontendController@shopping_help')->name('shopping-help');
Route::get('/testimoni', 'FrontendController@testimoni')->name('testimoni');
Route::get('/pengiriman-barang', 'FrontendController@pengiriman_barang')->name('pengiriman-barang');

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});

Route::get('/dbmigrate', function() {

   Artisan::call('migrate');
   return "DB Migrated!";

});

Route::get('/dbmigraterollback', function() {

   Artisan::call('migrate:rollback --step=1');
   return "DB Migrated!";

});

Route::post('/check_pin_trx', 'Controller@check_pin_trx')->name('check_pin_trx');



Route::group(['middleware' => ['auth', 'CheckRole']],function(){
	Route::get('/seller','HomeController@index')->name('seller');

	Route::name('seller.')->group(function () {
		Route::name('categories.')->group(function () {
			Route::get('seller/categories', 'Seller\CategoriesController@index')->name('index');
			Route::get('seller/categories/create', 'Seller\CategoriesController@create')->name('create');
			Route::post('seller/categories/store', 'Seller\CategoriesController@store')->name('store');
			Route::get('seller/categories/show/{id}', 'Seller\CategoriesController@show')->name('show');
			Route::get('seller/categories/edit/{id}', 'Seller\CategoriesController@edit')->name('edit');
			Route::post('seller/categories/update/{id}', 'Seller\CategoriesController@update')->name('update');
			Route::post('seller/categories/destroy/{id}', 'Seller\CategoriesController@destroy')->name('destroy');
		});
		Route::name('product.')->group(function () {
			Route::get('seller/product', 'Seller\ProductController@index')->name('index');
			Route::get('seller/product/create', 'Seller\ProductController@create')->name('create');
			Route::post('seller/product/store', 'Seller\ProductController@store')->name('store');
			Route::get('seller/product/show/{id}', 'Seller\ProductController@show')->name('show');
			Route::get('seller/product/edit/{id}', 'Seller\ProductController@edit')->name('edit');
			Route::post('seller/product/update/{id}', 'Seller\ProductController@update')->name('update');
			Route::post('seller/product/destroy/{id}', 'Seller\ProductController@destroy')->name('destroy');
		});
		Route::name('order.')->group(function () {
			Route::get('seller/order/index', 'Seller\OrderController@index')->name('index');
			Route::get('seller/order/create', 'Seller\OrderController@create')->name('create');
			Route::post('seller/order/store', 'Seller\OrderController@store')->name('store');
			Route::get('seller/order/show/{id}', 'Seller\OrderController@show')->name('show');
			Route::get('seller/order/edit/{id}', 'Seller\OrderController@edit')->name('edit');
			Route::post('seller/order/update/{id}', 'Seller\OrderController@update')->name('update');
			Route::post('seller/order/destroy/{id}', 'Seller\OrderController@destroy')->name('destroy');
		});	
		Route::name('order_status.')->group(function () {
			Route::get('seller/order_status/index', 'Seller\OrderStatusController@index')->name('index');
			Route::get('seller/order_status/create', 'Seller\OrderStatusController@create')->name('create');
			Route::post('seller/order_status/store', 'Seller\OrderStatusController@store')->name('store');
			Route::get('seller/order_status/show/{id}', 'Seller\OrderStatusController@show')->name('show');
			Route::get('seller/order_status/edit/{id}', 'Seller\OrderStatusController@edit')->name('edit');
			Route::post('seller/order_status/update/{id}', 'Seller\OrderStatusController@update')->name('update');
			Route::post('seller/order_status/destroy/{id}', 'Seller\OrderStatusController@destroy')->name('destroy');
		});		
		Route::name('vouchers.')->group(function () {
			Route::get('seller/vouchers', 'Seller\VouchersController@index')->name('index');
			Route::get('seller/vouchers/create', 'Seller\VouchersController@create')->name('create');
			Route::post('seller/vouchers/store', 'Seller\VouchersController@store')->name('store');
			Route::get('seller/vouchers/show/{id}', 'Seller\VouchersController@show')->name('show');
			Route::post('seller/vouchers/destroy/{id}', 'Seller\VouchersController@destroy')->name('destroy');
			Route::get('seller/vouchers/getJson/{id}', 'Seller\VouchersController@getJson')->name('getJson');
	
		});
	});


});

Route::group(['middleware' => ['auth', 'CheckRole']],function(){
	Route::get('/admin', 'HomeController@index')->name('admin');


	Route::name('admin.')->group(function () {
		Route::name('categories.')->group(function () {
			Route::get('admin/categories', 'Admin\CategoriesController@index')->name('index');
			Route::get('admin/categories/create', 'Admin\CategoriesController@create')->name('create');
			Route::post('admin/categories/store', 'Admin\CategoriesController@store')->name('store');
			Route::get('admin/categories/show/{id}', 'Admin\CategoriesController@show')->name('show');
			Route::get('admin/categories/edit/{id}', 'Admin\CategoriesController@edit')->name('edit');
			Route::post('admin/categories/update/{id}', 'Admin\CategoriesController@update')->name('update');
			Route::post('admin/categories/destroy/{id}', 'Admin\CategoriesController@destroy')->name('destroy');
		});

		Route::name('product.')->group(function () {
			Route::get('admin/product', 'Admin\ProductController@index')->name('index');
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

		Route::name('vouchers.')->group(function () {
			Route::get('admin/vouchers', 'Admin\VouchersController@index')->name('index');
			Route::get('admin/vouchers/create', 'Admin\VouchersController@create')->name('create');
			Route::post('admin/vouchers/store', 'Admin\VouchersController@store')->name('store');
			Route::get('admin/vouchers/show/{id}', 'Admin\VouchersController@show')->name('show');
			Route::post('admin/vouchers/destroy/{id}', 'Admin\VouchersController@destroy')->name('destroy');
			Route::get('admin/vouchers/getJson/{id}', 'Admin\VouchersController@getJson')->name('getJson');

		});

	});


});
Route::name('fe.')->group(function () {
	Route::get('fe/index', 'FrontendController@index')->name('index');

	Route::name('cart.')->group(function () {
		Route::post('fe/cart/store', 'Fe\CartController@store')->name('store');
		Route::get('fe/cart/index', 'Fe\CartController@index')->name('index');
		Route::get('fe/cart/show', 'Fe\CartController@show')->name('show');
		Route::get('fe/cart/destroy/{id}', 'Fe\CartController@destroy')->name('destroy');
		Route::post('fe/cart/update', 'Fe\CartController@update')->name('update');
		Route::get('cart/delete_cart', 'Fe\CartController@destroy_all')->name('destroy_all');


	});

	Route::name('order.')->group(function () {
		Route::get('payment', 'Fe\OrderController@store')->name('store');
	});	

	Route::name('history.')->group(function () {
		Route::get('fe/history/index', 'Fe\OrderHistoryController@index')->name('index');
		Route::get('admin/history/show/{id}', 'Fe\OrderHistoryController@show')->name('show');		
	});		
});

