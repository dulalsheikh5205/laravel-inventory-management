<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');

    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/update/password','UpdatePassword')->name('update.password');
});


// Supplier All Route
Route::controller(SupplierController::class)->group(function(){
    Route::get('/supplier/all','SupplierAll')->name('supplier.all');
    Route::get('/supplier/add','SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store','SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}','SupplierEdit')->name('supplier.edit');
    Route::post('/supplier/update','SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}','SupplierDelete')->name('supplier.delete');

    Route::get('/supplier/status/{status}/{id}','status')->name('supplier.status');
    
});


// Customer All Route
Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer/all','CustomerAll')->name('customer.all');
    Route::get('/customer/add','CustomerAdd')->name('customer.add');
    Route::post('/customer/store','CustomerStore')->name('customer.store');
    Route::get('/customer/edit/{id}','CustomerEdit')->name('customer.edit');
    Route::post('/customer/update','CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}','CustomerDelete')->name('customer.delete');

    Route::get('/customer/status/{status}/{id}','status')->name('customer.status');
    
});



// Unit All Route
Route::controller(UnitController::class)->group(function(){
    Route::get('/unit/all','UnitAll')->name('unit.all');
    Route::get('/unit/add','UnitAdd')->name('unit.add');
    Route::post('/unit/store','UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}','UnitEdit')->name('unit.edit');
    Route::post('/unit/update','UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}','UnitDelete')->name('unit.delete');
    
});



// Category All Route
Route::controller(CategoryController::class)->group(function(){
    Route::get('/category/all','CategoryAll')->name('category.all');
    Route::get('/unit/add','UnitAdd')->name('unit.add');
    Route::post('/unit/store','UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}','UnitEdit')->name('unit.edit');
    Route::post('/unit/update','UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}','UnitDelete')->name('unit.delete');
    
});



