<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\DiscountController;
use App\Http\Middleware\CacheResponse;

Route::middleware(SetLocale::class)->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('orders', OrderController::class)->only(['store', 'destroy']);
    });

    Route::middleware(CacheResponse::class)->group(function () {
        Route::resource('orders', OrderController::class)->only(['index']);
        Route::get('discount-calculate/{order}', [DiscountController::class, 'calculate'])->name('discount-calculate');
    });
});


