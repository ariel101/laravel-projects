<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DriverController;
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

});


// Route::middleware('auth:drivers')->group(function () {
//     Route::get('/driver/profile', function (Request $request) {
//         return $request->user(); // Devuelve el repartidor autenticado
//     });
// });