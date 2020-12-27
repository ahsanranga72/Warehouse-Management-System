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

Route::prefix('barcodesymbolgy')->group(function() {
    Route::get('/', 'BarcodeSymbolgyController@index')->name('barcodesymbolgy.view');
    Route::get('/add', 'BarcodeSymbolgyController@create')->name('add.barcodesymbolgy');
    Route::post('/store', 'BarcodeSymbolgyController@store')->name('barcodesymbolgy.store');
    Route::get('/edit/{id}', 'BarcodeSymbolgyController@edit')->name('barcodesymbolgy.edit');
    Route::post('/update/{id}', 'BarcodeSymbolgyController@update')->name('barcodesymbolgy.update');
    Route::get('/delete/{id}', 'BarcodeSymbolgyController@destroy')->name('barcodesymbolgy.delete');
});
