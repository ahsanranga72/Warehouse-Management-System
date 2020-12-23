<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LayoutController::class, 'index']);

//User
Route::get('/user-list',[ManagementController::class, 'UserList'])->name('user.list');
Route::get('/add-user-list',[ManagementController::class, 'AddUserList'])->name('add.user.list');
Route::post('/user-store',[ManagementController::class, 'UserStore'])->name('user.store');
Route::get('/user-edit/{id}',[ManagementController::class, 'UserEdit'])->name('user.edit');
Route::post('/user/update{id}',[ManagementController::class, 'UpdateUser'])->name('user.update');
Route::get('/user/delete/{id}',[ManagementController::class, 'UserDelete'])->name('user.delete');

//customer
Route::prefix('customer')->group(function(){
    Route::get('/customer-list',[CustomerController::class, 'CustomerList'])->name('customer.list');
    Route::get('/add-customer-list',[CustomerController::class, 'AddcustomerList'])->name('add.customer.list');
    Route::post('/customer-store',[CustomerController::class, 'CustomerStore'])->name('customer.store');
    Route::get('/customer-edit/{id}',[CustomerController::class, 'CustomerEdit'])->name('customer.edit');
    Route::post('/customer-update',[CustomerController::class, 'CustomerUpdate'])->name('customer.update');
    Route::get('/customer-delete/{id}',[CustomerController::class, 'CustomerDelete'])->name('customer.delete');
});
//Supplier
Route::prefix('supplier')->group(function(){
Route::get('/supplier-list',[SupplierController::class, 'SupplierList'])->name('supplier.list');
Route::get('/supplier-add',[SupplierController::class, 'AddSupplierList'])->name('add.supplier.list');
Route::post('/supplier-store',[SupplierController::class, 'SupplierStore'])->name('supplier.store');
Route::get('/supplier-edit/{id}',[SupplierController::class, 'SupplierEdit'])->name('supplier.edit');
Route::post('/supplier-update',[SupplierController::class, 'SupplierUpdate'])->name('supplier.update');
Route::get('/supplier-delete/{id}',[SupplierController::class, 'SupplierDelete'])->name('supplier.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
