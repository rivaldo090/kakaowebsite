<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SensorApiController;
use App\Http\Controllers\Api\SensorDataController;
use App\Http\Controllers\Api\AuthController;
use App\Models\SensorData;


// ========== AUTH ==========
Route::post('/registerr', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);

// ========== USER DATA ==========
Route::get('/users', [UserController::class, 'index']); // ❌ Hapus 'api/' di depan

Route::get('/test', function () {
    return ['message' => 'API aktif'];
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// ========== SENSOR DATA ==========
Route::post('/sensor', [SensorApiController::class, 'store']);

Route::post('/sensor-data', function (Request $request) {
    $validated = $request->validate([
        'temperature' => 'required|numeric',
        'humidity' => 'required|numeric',
        'soil_moisture' => 'required|numeric',
        'lamp_status' => 'required|string',
        'water_pump' => 'required|string',
        'fertilizer' => 'required|string',
    ]);

    SensorData::create($validated);

    return response()->json(['message' => 'Data sensor berhasil diterima'], 201);
});