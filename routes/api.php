<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\API\MainController;
use App\Http\Middleware\JwtAuth;

Route::group(['prefix' => 'api', 'middleware' => CheckLogin::class], function() {
	Route::get('/cart', [CartController::class, 'index']);
	Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
	Route::get('/cart/{id}', [CartController::class, 'delete']);
});

Route::group(['prefix' => 'api'], function() {
	Route::post('/login', [APIAuthController::class, 'login']);
	Route::post('/register', [APIAuthController::class, 'register']);

	Route::middleware(JwtAuth::class)->group(function () {
		Route::get('/category', [MainController::class, 'category']);
		Route::get('/canteen', [MainController::class, 'canteen']);
		Route::get('/canteen/{id}', [MainController::class, 'detailCanteen']);
		Route::get('/history', [MainController::class, 'history']);
	});
});