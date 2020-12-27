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

Route::prefix('brand')->group(function() {
    Route::get('/', 'BrandController@index')->name('brand.view');
    Route::get('/add', 'BrandController@create')->name('add.brand');
    Route::post('/store', 'BrandController@store')->name('brand.store');
    Route::get('/edit/{id}', 'BrandController@edit')->name('brand.edit');
    Route::post('/update/{id}', 'BrandController@update')->name('brand.update');
    Route::get('/delete/{id}', 'BrandController@destroy')->name('brand.delete');
});
