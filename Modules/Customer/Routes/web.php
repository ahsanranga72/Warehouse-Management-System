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

Route::prefix('customer')->group(function() {
    Route::get('/customer-list','CustomerController@CustomerList')->name('customer.list');
    Route::get('/add-customer-list','CustomerController@AddcustomerList')->name('add.customer.list');
    Route::post('/customer-store','CustomerController@CustomerStore')->name('customer.store');
    Route::get('/customer-edit/{id}','CustomerController@CustomerEdit')->name('customer.edit');
    Route::post('/customer-update','CustomerController@CustomerUpdate')->name('customer.update');
    Route::get('/customer-delete/{id}','CustomerController@CustomerDelete')->name('customer.delete');
});
