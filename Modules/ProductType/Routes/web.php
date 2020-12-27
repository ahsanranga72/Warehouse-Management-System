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

Route::prefix('producttype')->group(function() {
    Route::get('/', 'ProductTypeController@index')->name('producttype.view');
    Route::get('/add', 'ProductTypeController@create')->name('add.producttype');
    Route::post('/store', 'ProductTypeController@store')->name('producttype.store');
    Route::get('/edit/{id}', 'ProductTypeController@edit')->name('producttype.edit');
    Route::post('/update/{id}', 'ProductTypeController@update')->name('producttype.update');
    Route::get('/delete/{id}', 'ProductTypeController@destroy')->name('producttype.delete');
});

