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
    });
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
