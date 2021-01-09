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

Route::prefix('sale')->group(function() {
    Route::get('/list', 'SaleController@index')->name('sale.view');
    Route::get('/add', 'SaleController@create')->name('add.sale');
    Route::post('/store', 'SaleController@store')->name('sale.store');
    Route::get('/edit/{id}', 'SaleController@edit')->name('sale.edit');
    Route::post('/update/{id}', 'SaleController@update')->name('sale.update');
    Route::get('/delete/{id}', 'SaleController@destroy')->name('sale.delete'); 
    Route::get('/list-view/{id}', 'SaleController@view')->name('list.view');  
    //Route::get('/get_sale_data_by_id','PurchaseController@get_sale_data_by_id')->name('sale.data');
});
