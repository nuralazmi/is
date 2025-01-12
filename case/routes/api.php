<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\SetLocale;

Route::middleware(SetLocale::class)->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('orders', OrderController::class)->only(['index', 'store', 'destroy']);
    });
});


