<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/home', function () {
    return view('customers.home');
});

Route::get('/product', function () {
    return view('customers.products.index');
});

Route::get('/product/female', function () {
    return view('customers.products.female');
});

Route::get('/product/male', function () {
    return view('customers.products.male');
});

Route::get('/profile', function () {
    return view('customers.profiles.profile');
});

Route::get('/cart', function () {
    return view('customers.carts.cart');
});
