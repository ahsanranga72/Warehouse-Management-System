<?php

use Modules\User\Http\Controllers\HomeController;
use Modules\User\Http\Controllers\ProfileController;
use Modules\User\Http\Controllers\UserController;

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
Route::get('/home', [HomeController::class , 'index'])->name('home');


Route::group(['middleware'=>'auth'], function(){
	Route::prefix('users')->group(function(){
	route::get('/view',[UserController::class, 'view'])->name('users.view');
	route::get('/add', [UserController::class, 'add'])->name('users.add');
	route::post('/store', [UserController::class, 'store'])->name('users.store');
	route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
	route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
	route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});

Route::prefix('profile')->group(function(){
	route::get('/view',[ProfileController::class,'view'])->name('profile.view');
	route::get('/password/view', [ProfileController::class,'passwordView'])->name('password.view');
	route::post('/store', [ProfileController::class,'store'])->name('profile.store');
	route::get('/edit', [ProfileController::class,'edit'])->name('profile.edit');
	route::post('/update', [ProfileController::class,'update'])->name('profile.update');
	route::get('/delete/{id}', [ProfileController::class,'delete'])->name('profile.delete');
	route::post('/password/update', [ProfileController::class,'passwordupdate'])->name('password.update.view');
});
});
