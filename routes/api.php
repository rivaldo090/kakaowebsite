<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\SensorApiController;
use App\Http\Controllers\Api\SensorDataController;


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/sensor', function (Request $request){
    return response()->json([
        'status' => 'datareceived',
        'data' => $request->all()
    ]);
});


Route::post('/sensor', [SensorApiController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);

// Route yang butuh token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/sensor/latest', [SensorDataController::class, 'latest']);
});
