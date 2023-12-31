<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::view('/create-product','product.create')->name('product.create');
// Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
Route::post('/store-product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'edit'])->name('product.edit');
Route::patch('/product/{product}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');

Route::resource('employees',EmployeeController::class);
