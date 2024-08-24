<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/products', [HomeController::class, 'product'])->name('products');
Route::get('/product/{id}', [HomeController::class, 'product_detail'])->name('product.detail');


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
        Route::get('/my-account/orders', [MyAccountController::class, 'orders'])->name('my-account.orders');
        Route::get('/my-account/order/detail/{id}', [MyAccountController::class, 'order_detail'])->name('my-account.order.detail');
        Route::post('/my-account/order/cancel/{id}', [MyAccountController::class, 'order_cancel'])->name('my-account.order.cancel');
        Route::post('/my-account/order/confirm/{id}', [MyAccountController::class, 'order_confirm'])->name('my-account.order.confirm');
        Route::get('/redirect/pay/{id}', function (Request $request, string $id) {
            return redirect()->route('my-account.order.detail', $id)->with('success', 'Payment Successful');
        })->name('redirect.pay');
    });

    Route::middleware('isRole:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
        Route::post('/admin/categories/store', [AdminController::class, 'categories_store'])->name('admin.categories.store');
        Route::post('/admin/categories/update/{id}', [AdminController::class, 'categories_update'])->name('admin.categories.update');
        Route::get('/admin/categories/destroy/{id}', [AdminController::class, 'categories_destroy'])->name('admin.categories.destroy');

        Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/admin/products/create', [AdminController::class, 'products_create'])->name('admin.products.create');
        Route::post('/admin/products/store', [AdminController::class, 'products_store'])->name('admin.products.store');
        Route::get('/admin/products/edit/{id}', [AdminController::class, 'products_edit'])->name('admin.products.edit');
        Route::post('/admin/products/update/{id}', [AdminController::class, 'products_update'])->name('admin.products.update');
        Route::get('/admin/products/destroy/{id}', [AdminController::class, 'products_destroy'])->name('admin.products.destroy');
        Route::delete('/admin/products/images/delete/{id}', [AdminController::class, 'products_images_delete'])->name('admin.products.images.delete');

        Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/admin/orders/{id}', [AdminController::class, 'orders_detail'])->name('admin.orders.detail');
        Route::get('/admin/orders/edit/{id}', [AdminController::class, 'orders_edit'])->name('admin.orders.edit');
        Route::post('/admin/orders/update/{id}', [AdminController::class, 'orders_update'])->name('admin.orders.update');

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        // Route::get('/admin/users/{id}', [AdminController::class, 'users_detail'])->name('admin.users.detail');
        Route::get('/admin/users/create', [AdminController::class, 'users_create'])->name('admin.users.create');
        Route::post('/admin/users/store', [AdminController::class, 'users_store'])->name('admin.users.store');
        Route::get('/admin/users/edit/{id}', [AdminController::class, 'users_edit'])->name('admin.users.edit');
        Route::post('/admin/users/update/{id}', [AdminController::class, 'users_update'])->name('admin.users.update');
        Route::get('/admin/users/destroy/{id}', [AdminController::class, 'users_destroy'])->name('admin.users.destroy');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/api/province', [APIController::class, 'get_province'])->name('api.province');
Route::get('/api/city', [APIController::class, 'get_city'])->name('api.city');
Route::post('/api/cost', [APIController::class, 'get_cost'])->name('api.cost');
Route::post('/midtrans/callback', [OrderController::class, 'midtransCallback'])->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class)->name('midtrans.callback');