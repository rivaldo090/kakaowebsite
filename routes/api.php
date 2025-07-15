<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\SensorViewController;
use App\Http\Controllers\API\AuthController;

// ------------------------
// ✅ Endpoint Sensor
// ------------------------
Route::apiResource('sensor', SensorController::class)->only(['index', 'store']);

// Data sensor terbaru (untuk dashboard)
Route::get('/sensor-latest', [SensorViewController::class, 'latest'])->name('sensor.latest');

// ------------------------
// ✅ Tes API
// ------------------------
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World']);
});

// ------------------------
// ✅ Authentication
// ------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);
});


// routes/api.php
Route::middleware('auth:sanctum')->get('/sensor/latest', function () {
    return \App\Models\SensorData::latest()->first();
});
