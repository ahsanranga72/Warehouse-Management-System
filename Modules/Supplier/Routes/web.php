<?php
use Modules\Supplier\Http\Controllers\SupplierController;

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

Route::prefix('supplier')->group(function() {
Route::get('/supplier-list',[SupplierController::class, 'SupplierList'])->name('supplier.list');
Route::get('/supplier-add',[SupplierController::class, 'create'])->name('add.supplier.list');
Route::post('/supplier-store',[SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier-edit/{id}',[SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier-update',[SupplierController::class, 'update'])->name('supplier.update');
Route::get('/supplier-delete/{id}',[SupplierController::class, 'destroy'])->name('supplier.delete');
});
