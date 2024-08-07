<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/product/detail', [HomeController::class, 'productDetail'])->name('product.detail');
// Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');


Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
Route::get('/my-account/account-detail', [MyAccountController::class, 'account_detail'])->name('my-account.account-detail');
Route::get('/my-account/orders', [MyAccountController::class, 'orders'])->name('my-account.orders');
Route::get('/my-account/orders/detail', [MyAccountController::class, 'orders_detail'])->name('my-account.orders.detail');
Route::get('/my-account/edit-account', [MyAccountController::class, 'edit_account'])->name('my-account.edit-account');
Route::post('/my-account/edit-account', [MyAccountController::class, 'action_edit_account'])->name('my-account.edit-account.action');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_act'])->name('login.action');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_act'])->name('register.action');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');