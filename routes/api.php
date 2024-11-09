<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('province', [APIController::class, 'get_province'])->name('api.province');
Route::get('city', [APIController::class, 'get_city'])->name('api.city');
Route::post('cost', [APIController::class, 'get_cost'])->name('api.cost');
Route::post('midtrans/callback', [APIController::class, 'midtrans_callback'])->name('midtrans.callback');