<?php

use App\Http\Controllers\Dashboard\OrderController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\OverviewController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::group(['prefix' => '/dashboard', 'middleware' => CheckLogin::class], function() {
	Route::get('/', [OverviewController::class, 'index'])->name('dashboard.index');

	Route::get('/menu', [MenuController::class, 'index'])->name('dashboard.menu');
	Route::post('/menu', [MenuController::class, 'store'])->name('dashboard.menu.store');
	Route::delete('/menu/delete/{id}', [MenuController::class, 'delete'])->name('dashboard.menu.delete');

	Route::get('/order', [OrderController::class, 'index'])->name('dashboard.order');
	Route::put('/order/update/{order_number}', [OrderController::class, 'update'])->name('dashboard.order.update');

	// Admin
	Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');
	Route::post('/user', [UserController::class, 'store'])->name('dashboard.user.store');
	Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('dashboard.user.delete');

	Route::get('/category', [CategoryController::class, 'index'])->name('dashboard.category');
	Route::post('/category', [CategoryController::class, 'store'])->name('dashboard.category.store');
	Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('dashboard.category.delete');
});
