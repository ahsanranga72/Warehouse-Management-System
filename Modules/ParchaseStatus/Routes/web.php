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

Route::prefix('parchasestatus')->group(function() {
    Route::get('/', 'ParchaseStatusController@index')->name('parchasestatus.view');
    Route::get('/add', 'ParchaseStatusController@create')->name('add.parchasestatus');
    Route::post('/store', 'ParchaseStatusController@store')->name('parchasestatus.store');
    Route::get('/edit/{id}', 'ParchaseStatusController@edit')->name('parchasestatus.edit');
    Route::post('/update/{id}', 'ParchaseStatusController@update')->name('parchasestatus.update');
    Route::get('/delete/{id}', 'ParchaseStatusController@destroy')->name('parchasestatus.delete');
});
