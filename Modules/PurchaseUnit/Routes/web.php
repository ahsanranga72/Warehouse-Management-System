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

Route::prefix('purchaseunit')->group(function() {
    Route::get('/', 'PurchaseUnitController@index')->name('purchaseunit.view');
    Route::get('/add', 'PurchaseUnitController@create')->name('add.purchaseunit');
    Route::post('/store', 'PurchaseUnitController@store')->name('purchaseunit.store');
    Route::get('/edit/{id}', 'PurchaseUnitController@edit')->name('purchaseunit.edit');
    Route::post('/update/{id}', 'PurchaseUnitController@update')->name('purchaseunit.update');
    Route::get('/delete/{id}', 'PurchaseUnitController@destroy')->name('purchaseunit.delete');
});
