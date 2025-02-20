<?php

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/client/login', [ClientController::class, 'login']);
Route::post('/driver/login', [DriverController::class, 'login']);
Route::post('/client/register', [ClientController::class, 'register']);

Route::middleware('auth:clients', 'jwt.auth')->group(function(){ 
    Route::get('/client/profile',[ClientController::class, 'profile']);
    //Log::info('Archivo de rutas cargado.');
    Route::get('/client', [ClientController::class, 'index']);
    Route::post('/client', [ClientController::class, 'store']);
    Route::put('/client/{id}', [ClientController::class, 'update']);

    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::put('/order', [OrderController::class, 'update']);

    Route::get('/category', [CategoryController::class, 'index']);

    Route::get('/bisiness', [BusinessController::class, 'index']);

    Route::get('/product', [ProductController::class, 'index']);

});




// Route::middleware('auth:drivers')->group(function () {
//     Route::get('/driver/profile', function (Request $request) {
//         return $request->user(); // Devuelve el repartidor autenticado
//     });
// });