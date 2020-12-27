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

Route::prefix('saleunit')->group(function() {
    Route::get('/', 'SaleUnitController@index')->name('saleunit.view');
    Route::get('/add', 'SaleUnitController@create')->name('add.saleunit');
    Route::post('/store', 'SaleUnitController@store')->name('saleunit.store');
    Route::get('/edit/{id}', 'SaleUnitController@edit')->name('saleunit.edit');
    Route::post('/update/{id}', 'SaleUnitController@update')->name('saleunit.update');
    Route::get('/delete/{id}', 'SaleUnitController@destroy')->name('saleunit.delete');
});
