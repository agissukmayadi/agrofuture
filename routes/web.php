<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/products', [HomeController::class, 'product'])->name('products');
Route::get('/product/{slug}', [HomeController::class, 'product_detail'])->name('product.detail');
Route::get('/tourism', [HomeController::class, 'tourism'])->name('tourism');
Route::get('/tourism/{slug}', [HomeController::class, 'tourism_detail'])->name('tourism.detail');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_action'])->name('login.action');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_action'])->name('register.action');
});

Route::middleware('auth')->group(function () {
    Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
    Route::get('/my-account/account-detail', [MyAccountController::class, 'account_detail'])->name('my-account.account-detail');
    Route::get('/my-account/edit-account', [MyAccountController::class, 'edit_account'])->name('my-account.edit-account');
    Route::post('/my-account/edit-account', [MyAccountController::class, 'action_edit_account'])->name('my-account.edit-account.action');

    Route::middleware('isRole:customer')->group(function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
        Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::get('/order/detail/{id}', [OrderController::class, 'show'])->name('order.detail');
        Route::post('/order/cancel/{id}', [OrderController::class, 'cancel'])->name('order.cancel');
        Route::post('/order/confirm/{id}', [OrderController::class, 'confirm'])->name('order.confirm');
        Route::get('/redirect/pay/{id}', function (Request $request, string $id) {
            return redirect()->route('order.detail', $id)->with('success', 'Payment Successful');
        })->name('redirect.pay');
    });

    Route::middleware('isRole:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
        Route::post('/admin/category/store', [AdminController::class, 'category_store'])->name('admin.category.store');
        Route::post('/admin/category/update/{id}', [AdminController::class, 'category_update'])->name('admin.category.update');
        Route::get('/admin/category/destroy/{id}', [AdminController::class, 'category_destroy'])->name('admin.category.destroy');

        Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/admin/product/create', [AdminController::class, 'product_create'])->name('admin.product.create');
        Route::post('/admin/product/store', [AdminController::class, 'product_store'])->name('admin.product.store');
        Route::get('/admin/product/edit/{id}', [AdminController::class, 'product_edit'])->name('admin.product.edit');
        Route::post('/admin/product/update/{id}', [AdminController::class, 'product_update'])->name('admin.product.update');
        Route::get('/admin/product/destroy/{id}', [AdminController::class, 'product_destroy'])->name('admin.product.destroy');
        Route::delete('/admin/product/images/delete/{id}', [AdminController::class, 'product_images_delete'])->name('admin.product.images.delete');

        Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/admin/order/detail/{id}', [AdminController::class, 'order_detail'])->name('admin.order.detail');
        Route::post('/admin/order/cancel/{id}', [AdminController::class, 'order_cancel'])->name('admin.order.cancel');

        Route::post('/admin/order/tracking_number/{id}', [AdminController::class, 'order_tracking_number'])->name('admin.order.tracking_number');

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/user/create', [AdminController::class, 'user_create'])->name('admin.user.create');
        Route::post('/admin/user/store', [AdminController::class, 'user_store'])->name('admin.user.store');
        Route::get('/admin/user/edit/{id}', [AdminController::class, 'user_edit'])->name('admin.user.edit');
        Route::post('/admin/user/update/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
        Route::get('/admin/user/destroy/{id}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');