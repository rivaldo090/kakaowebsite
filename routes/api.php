<?php

use App\Http\Controllers\KelembapanController;

Route::post('/kirim-data', [KelembapanController::class, 'store']);

