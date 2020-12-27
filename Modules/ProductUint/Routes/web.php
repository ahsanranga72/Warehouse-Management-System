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

Route::prefix('productunit')->group(function() {
    Route::get('/', 'ProductUintController@index')->name('productunit.view');
    Route::get('/add', 'ProductUintController@create')->name('add.productunit');
    Route::post('/store', 'ProductUintController@store')->name('productunit.store');
    Route::get('/edit/{id}', 'ProductUintController@edit')->name('productunit.edit');
    Route::post('/update/{id}', 'ProductUintController@update')->name('productunit.update');
    Route::get('/delete/{id}', 'ProductUintController@destroy')->name('productunit.delete');
});
