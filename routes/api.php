<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SensorViewController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\KomponenApiController;


// ------------------------
// ✅ Tes API
// ------------------------
Route::get('/ping', fn() => response()->json(['message' => 'Laravel OK']));
Route::get('/hello', fn() => response()->json(['message' => 'Hello World']));

// ------------------------
// ✅ Sensor Endpoint
// ------------------------
Route::apiResource('sensor', SensorController::class)->only(['index', 'store']);
Route::get('/sensor-latest', [SensorViewController::class, 'latest'])->name('sensor.latest');

// ------------------------
// ✅ Endpoint Settings (untuk Raspberry Pi)
// ------------------------
Route::get('/settings', [SettingController::class, 'index'])->name('api.settings');

// ------------------------
// ✅ Auth
// ------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);

    // Data sensor terbaru via token
    Route::get('/sensor/latest', function () {
        return \App\Models\SensorData::latest()->first();
    });
});


Route::post('/jadwal/penyiraman',  [JadwalController::class, 'simpanPenyiraman']);
Route::post('/jadwal/pencahayaan', [JadwalController::class, 'simpanPencahayaan']);
Route::post('/jadwal/pemupukan',   [JadwalController::class, 'simpanPemupukan']);

Route::post('/komponen', [KomponenApiController::class, 'store']);
Route::get('/komponen', [KomponenApiController::class, 'show']);
