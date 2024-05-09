<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);
    });

    Route::apiResource('products', ProductController::class, 'index');

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('carts', CartController::class);
        Route::post('/cart/add', [CartController::class, 'addToCart']);
        Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
        Route::post('/cart/update/{id}', [CartController::class, 'updateCart']);
        Route::get('/cart', [CartController::class, 'viewCart']);
    });
});