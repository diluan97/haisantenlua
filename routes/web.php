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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Guest\HomeController@getHome')->name('home');
Route::get('san-pham/{slug}', 'Guest\HomeController@getDetailProduct')->name('detail_product');
route::get('tat-ca-san-pham', 'Guest\HomeController@getAllProduct')->name('all_product');




Route::get('admin','Admin\LoginController@getLogin')->name('login');
Route::post('admin', 'Admin\LoginController@postLogin')->name('post_login');
Route::get('logout', 'Admin\LoginController@getLogout')->name('logout');
/*                                      ADMIN                                        */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {
    Route::get('drash', 'Admin\AdminController@drash')->name('drash');
    Route::resource('users', 'Admin\UserController')->names('admin_users');
    Route::resource('products', 'Admin\AdminController')->names('admin_products');
    Route::resource('categories', 'Admin\CategoryController')->names('admin_category');
    Route::resource('products/{product_slug}/variant', 'Admin\ProductVariantController')->names('admin_product_variant');
    Route::resource('slides', 'Admin\SlideController')->names('admin_slide');
    Route::resource('orders','Admin\OrderController')->names('admin_order');
    Route::post('update-order/{id}', 'Admin\OrderController@postUpdateOrder')->name('update_order');
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    Route::get('search-admin-product', 'Admin\AdminSearchController@getProduct')->name('search_products');
    Route::get('search-admin-category', 'Admin\AdminSearchController@getCategory')->name('search_categories');
    Route::get('search-admin-slide', 'Admin\AdminSearchController@getSlide')->name('search_slides');
    Route::get('search-admin-order', 'Admin\AdminSearchController@getOrder')->name('search_orders');
});
