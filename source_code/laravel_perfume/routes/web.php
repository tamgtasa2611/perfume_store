<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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
    return view('customers.home');
})->name('home');

Route::get('/home', function () {
    return view('customers.home');
})->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/discover', function () {
    return view('customers.products.discover');
})->name('discover');

//show 1 product
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

Route::get('/contact', function () {
    return view('customers.contact');
})->name('contact');

Route::get('/profile', function () {
    return view('customers.profiles.profile');
})->name('profile');

Route::get('/cart', function () {
    return view('customers.carts.cart');
})->name('cart');

////show create form
//Route::get('/admin/customer/create', [CustomerController::class, 'create'])->name('admin/customer/create');
//
////store data
//Route::post('/admin/customer/store', [CustomerController::class, 'store'])->name('customer/store');

Route::get('/create', [CustomerController::class, 'create'])->name('customer/create');
Route::post('/create', [CustomerController::class, 'store'])->name('customer/store');
//show edit form
Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer/edit');
Route::put('/{customer}/edit', [CustomerController::class, 'update'])->name('customer/update');
Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer/destroy');

//Route::get('/admin/customer/edit', [CustomerController::class, 'edit'])->name('customer/edit');
//Route::put('/admin/customer/update', [CustomerController::class, 'update'])->name('{customers}/update');

//show home customer manager
Route::get('/admin/customer', [CustomerController::class, 'show'])->name('admin/customer');
