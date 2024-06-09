<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Middleware\CheckLogin;

Route::group(['prefix' => 'api', 'middleware' => CheckLogin::class], function() {
	Route::get('/cart', [CartController::class, 'index']);
	Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
	Route::get('/cart/{id}', [CartController::class, 'delete']);
});