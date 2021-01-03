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

Route::prefix('bank')->group(function() {
    Route::get('/', 'BankController@index')->name('bank.view');
    Route::get('/add', 'BankController@create')->name('add.bank');
    Route::post('/store', 'BankController@store')->name('bank.store');
    Route::get('/edit/{id}', 'BankController@edit')->name('bank.edit');
    Route::post('/update/{id}', 'BankController@update')->name('bank.update');
    Route::get('/delete/{id}', 'BankController@destroy')->name('bank.delete');
});
