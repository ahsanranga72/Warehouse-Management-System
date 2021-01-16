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
    Route::get('edit-product/{id}', 'ProductController@editproduct')->name('products.edit');
    Route::post('update-product/{id}', 'ProductController@updateproduct')->name('products.update');
    Route::get('/product-delete/{id}', 'ProductController@delete')->name('product.delete');
    Route::get('/product-duplicatecheck', 'ProductController@check_product_with_warehouse')->name('product.duplicatecheck');
    Route::get('/get_product_unit_for_sale/{id}', 'ProductController@get_product_unit_for_sale');
    Route::get('/get_product_unit_for_purchase/{id}', 'ProductController@get_product_unit_for_purchase');
    

    
});
