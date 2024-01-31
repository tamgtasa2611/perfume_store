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

Route::get('/product/female', function () {
    return view('customers.products.female');
})->name('product/female');

Route::get('/product/male', function () {
    return view('customers.products.male');
})->name('product/male');

Route::get('/profile', function () {
    return view('customers.profiles.profile');
})->name('profile');

Route::get('/cart', function () {
    return view('customers.carts.cart');
})->name('cart');

Route::get('/admin', [CustomerController::class, 'index'])->name('customer_manager');

