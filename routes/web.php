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

Route::get('/', 'MainController@index')->name('main');

/* Shop */
Route::middleware('auth')->group(function() {
    Route::prefix('shop')->group(function() {
        Route::get('/', 'ShopController@index')->name('shop');
        Route::get('products/{category?}', 'ShopController@products')->name('products');
        Route::post('add-to-cart', 'CartController@addProduct')->name('add-to-cart');
        Route::get('cart', 'CartController@cart')->name('cart');
        Route::delete('remove-from-cart', 'CartController@remove')->name('remove-from-cart');
        Route::prefix('product')->group(function() {
            Route::get('/{product}', 'ShopController@productInfo')->name('product-info');
            Route::get('comment/{comment}', 'CommentController@getComment');
            Route::post('add-comment', 'CommentController@add')->name('add-comment');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin-panel');
    });
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
