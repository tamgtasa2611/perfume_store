<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\CheckLoginCustomer;

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

//check login
Route::middleware(CheckLoginCustomer::class)->group(function () {
    Route::get('/profile', [CustomerController::class, 'editProfile'])->name('profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');

    Route::get('/orders_history', [CustomerController::class, 'showOrdersHistory'])->name('ordersHistory');
    Route::get('/order_{id}/detail',[OrderController::class,'orderDetail'])->name('orderDetail');

    Route::get('/change_password', [CustomerController::class, 'editPassword'])->name('pwd.edit');
    Route::put('/change_password', [CustomerController::class, 'updatePassword'])->name('pwd.update');

    Route::get('/cart', [ProductController::class, 'cart'])->name('product.cart');
    Route::get('/cartAjax', [ProductController::class, 'cartAjax'])->name('product.cartAjax');
    Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');
    Route::get('/product/addToCartAjax/{id}', [ProductController::class, 'addToCartAjax'])->name('product.addToCartAjax');
    Route::get('/updateCartQuantity/{id}', [ProductController::class, 'updateCartQuantity'])->name('product.updateCartQuantity');
    Route::get('/deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])->name('product.deleteFromCart');
    Route::get('/deleteAllFromCart', [ProductController::class, 'deleteAllFromCart'])->name('product.deleteAllFromCart');

    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'checkoutProcess'])->name('checkoutProcess');
});

Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/register', [CustomerController::class, 'registerProcess'])->name('customer.registerProcess');

Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/forgot_password', [CustomerController::class, 'forgotPassword'])->name('customer.forgotPassword');

// -------- Start Dashboard manager ----------

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

// -------- End Dashboard manager ----------


// -------- Start Product manager ----------
Route::prefix('admin/product')->group(function () {

    Route::get('/', [ProductController::class, 'show2'])->name('admin.product');
//
////show create form
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');
//show edit form
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/{product}/edit', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

});
// -------- End Product manager ----------

// -------- Start Customer manager ----------
//show home customer manager
Route::prefix('admin/customer')->group(function () {
    Route::get('/', [CustomerController::class, 'show'])->name('admin.customer');

//show create form
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/create', [CustomerController::class, 'store'])->name('customer.store');
//show edit form
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/{customer}/edit', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
//show edit status form
    Route::get('/admin/{customer}/status', [CustomerController::class, 'editStatus'])->name('customer.editStatus');
    Route::put('/admin/{customer}/status', [CustomerController::class, 'updateStatus'])->name('customer.status');
});
// -------- End Customer manager ----------

// -------- Start Category manager ----------
Route::prefix('admin/category')->group(function(){
    //Route read
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    //Route hiển thị form thêm brand
    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    //Route thêm dữ liệu lên db
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    //Route hiển thị form sửa
    Route::get('/{category}/edit',[\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    //Route update dữ liệu trên db
    Route::put('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    //Route để xóa
    Route::delete('/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
});
// -------- End Category manager ----------

// -------- Start Brand manager ----------
Route::prefix('admin/brand')->group(function(){
    //Route read
    Route::get('/', [\App\Http\Controllers\BrandController::class, 'index'])->name('brand.index');
    //Route hiển thị form thêm brand
    Route::get('/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
    //Route thêm dữ liệu lên db
    Route::post('/create', [\App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
    //Route hiển thị form sửa
    Route::get('/{brand}/edit',[\App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
    //Route update dữ liệu trên db
    Route::put('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
    //Route để xóa
    Route::delete('/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.destroy');
});
// -------- End Brand manager ----------

// -------- Start Size manager ----------
Route::prefix('admin/size')->group(function(){
    //Route read
    Route::get('/', [\App\Http\Controllers\SizeController::class, 'index'])->name('size.index');
    //Route hiển thị form thêm brand
    Route::get('/create', [\App\Http\Controllers\SizeController::class, 'create'])->name('size.create');
    //Route thêm dữ liệu lên db
    Route::post('/create', [\App\Http\Controllers\SizeController::class, 'store'])->name('size.store');
    //Route hiển thị form sửa
    Route::get('/{size}/edit',[\App\Http\Controllers\SizeController::class, 'edit'])->name('size.edit');
    //Route update dữ liệu trên db
    Route::put('/{size}/edit', [\App\Http\Controllers\SizeController::class, 'update'])->name('size.update');
    //Route để xóa
    Route::delete('/{size}', [\App\Http\Controllers\SizeController::class, 'destroy'])->name('size.destroy');
});
// -------- End Size manager ----------

// -------- End Order manager ----------
Route::prefix('admin/order')->group(function(){
    //Route read
    Route::get('/index', [OrderController::class, 'showOrder'])->name('order.index');
    //Route hiển thị form sửa
    Route::get('/order_{id}/edit',[OrderController::class, 'edit'])->name('order.edit');
    //Route update dữ liệu trên db
    Route::put('/order_{order}/edit', [OrderController::class, 'update'])->name('order.update');
});
