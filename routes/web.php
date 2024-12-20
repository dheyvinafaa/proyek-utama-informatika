<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Middleware\CheckLogin;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register_post', [AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/login_post', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/kantin/{slug}', [HomeController::class, 'kantin'])->name('kantin');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/menu', [HomeController::class, 'getAllMenu'])->name('menu');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order_number}', [OrderController::class, 'detail'])->name('order.detail');

Route::group(['prefix' => 'api2', 'middleware' => CheckLogin::class], function() {
	Route::get('/cart', [CartController::class, 'index']);
	Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
	Route::get('/cart/{id}', [CartController::class, 'delete']);
});

include 'api.php';
include 'dashboard.php';