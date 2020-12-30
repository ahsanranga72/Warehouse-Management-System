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

Route::prefix('ordertax')->group(function() {
    Route::get('/order-list', 'OrderTaxController@index')->name('ordertax.view');
    Route::get('/add', 'OrderTaxController@create')->name('add.ordertax');
    Route::post('/store', 'OrderTaxController@store')->name('ordertax.store');
    Route::get('/edit/{id}', 'OrderTaxController@edit')->name('ordertax.edit');
    Route::post('/update/{id}', 'OrderTaxController@update')->name('ordertax.update');
    Route::get('/delete/{id}', 'OrderTaxController@destroy')->name('ordertax.delete');
});
