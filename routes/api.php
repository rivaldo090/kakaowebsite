<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SensorDataController;
use App\Http\Controllers\SensorController; // <- Ini tetap jika SensorController kamu bukan di folder Api

// ========== TES API ==========
Route::get('/test', fn() => ['message' => 'API aktif']);

// ========== AUTH ==========
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// ========== USER ==========
Route::get('/users', [UserController::class, 'index']);

// ========== SENSOR ==========
Route::post('/sensor-data', [SensorController::class, 'store']); // ✅ endpoint untuk menerima data dari Raspberry Pi
