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

Route::prefix('user')->group(function() {
Route::get('/user-list', 'UserController@index')->name('user.list');
Route::get('/add-user-list','UserController@AddUserList')->name('add.user.list');
Route::post('/user-store','UserController@UserStore')->name('user.store');
Route::get('/user-edit/{id}','UserController@UserEdit')->name('user.edit');
Route::post('/user/update{id}','UserController@UpdateUser')->name('user.update');
Route::get('/user/delete/{id}','UserController@UserDelete')->name('user.delete');
});
