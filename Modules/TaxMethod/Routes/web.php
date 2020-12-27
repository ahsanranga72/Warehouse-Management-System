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

Route::prefix('taxmethod')->group(function() {
    Route::get('/', 'TaxMethodController@index')->name('taxmethod.view');
    Route::get('/add', 'TaxMethodController@create')->name('add.taxmethod');
    Route::post('/store', 'TaxMethodController@store')->name('taxmethod.store');
    Route::get('/edit/{id}', 'TaxMethodController@edit')->name('taxmethod.edit');
    Route::post('/update/{id}', 'TaxMethodController@update')->name('taxmethod.update');
    Route::get('/delete/{id}', 'TaxMethodController@destroy')->name('taxmethod.delete');
});
