<?php

use App\Http\Controllers\Web\BusinessController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\DriverController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource('products', ProductController::class);
Route::resource('drivers', DriverController::class);
Route::resource('categories', CategoryController::class);
Route::resource('businesses',BusinessController::class);
Route::resource('clients', ClientController::class);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
