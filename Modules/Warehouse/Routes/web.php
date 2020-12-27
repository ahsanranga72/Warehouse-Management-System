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

Route::prefix('warehouse')->group(function() {
    Route::get('/', 'WarehouseController@index')->name('warehouse.view');
    Route::get('/add', 'WarehouseController@create')->name('add.warehouse');
    Route::post('/store', 'WarehouseController@store')->name('warehouse.store');
    Route::get('/edit/{id}', 'WarehouseController@edit')->name('warehouse.edit');
    Route::post('/update/{id}', 'WarehouseController@update')->name('warehouse.update');
    Route::get('/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
});
