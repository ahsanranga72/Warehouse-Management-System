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

Route::prefix('purchase')->group(function() {
    Route::get('/list', 'PurchaseController@index')->name('purchase.view');
    Route::get('/add','PurchaseController@create')->name('purchase.add');
    Route::get('/get_products', 'PurchaseController@get_product_list_by_product_code')->name('product.list');
    Route::post('/store','PurchaseController@storePurchase')->name('purchase.store');
    Route::get('/get_product_by_id','PurchaseController@get_product_by_id')->name('order.product');
    
});
