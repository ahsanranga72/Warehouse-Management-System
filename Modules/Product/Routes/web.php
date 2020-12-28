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

Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@index');
    Route::get('add-product', 'ProductController@addproduct')->name('add.product');
    Route::post('store-product', 'ProductController@storeproduct')->name('store.product');
    Route::get('list-product', 'ProductController@productlist')->name('products.list');
    Route::get('/product-delete/{id}', 'ProductController@delete')->name('product.delete');
});
