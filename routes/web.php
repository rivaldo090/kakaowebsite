<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PemupukanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\WatteringController;
use App\Http\Controllers\PencahayaanController;
use App\Http\Controllers\SensorViewController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\Api\SensorDataController;
use App\Models\SensorData;
use App\Events\DataSensorUpdated;
use Illuminate\Http\Request;

//kebutuhan deploy
Route::get('/cek-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Laravel bisa konek ke database.";
    } catch (\Exception $e) {
        return "❌ Gagal konek DB: " . $e->getMessage();
    }
});


// ==================== AUTH ====================

// Halaman login awal
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ==================== DASHBOARD ====================

// User dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin dashboard
Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
Route::get('/admin/devices', [AdminDashboardController::class, 'devices'])->name('admin.devices');


// ==================== MONITORING & SENSOR ====================

// Halaman monitoring sensor (Blade)
Route::get('/sensor', [SensorViewController::class, 'index'])->name('sensor.index');

// Data sensor terbaru (untuk fetch frontend)
Route::get('/sensor/latest', [SensorViewController::class, 'latest'])->name('sensor.latest');

// Endpoint simpan data sensor dari Raspberry Pi
Route::post('/sensor-data', [SensorDataController::class, 'store'])->name('sensor.store');

// Terima data suhu sederhana (jika masih dipakai)
Route::post('/terima-suhu', [SensorController::class, 'terimaSuhu']);


// ==================== PENGATURAN ====================

// Penyiraman
Route::get('/settings/watering', function () {
    return view('setting_wattering');
})->name('setting_wattering');
Route::post('/penyiraman/store', [WatteringController::class, 'store'])->name('penyiraman.store');

// Pencahayaan
Route::get('/settings/lighting', function () {
    return view('setting_lighting');
})->name('setting_lighting');
Route::post('/setting_lighting/store', [PencahayaanController::class, 'store'])->name('setting_lighting.store');
Route::post('/pencahayaan/manual', [PencahayaanController::class, 'kontrolManual']);

// profil
Route::get('/profil', function () {
    return view('profil');
})->name('profil');


// Pemupukan
Route::get('/settings/fertilization', function () {
    return view('pemupukan');
})->name('pemupukan');
Route::post('/pemupukan/store', [PemupukanController::class, 'store'])->name('pemupukan.store');


// ==================== HALAMAN TAMBAHAN ====================

// History Penyiraman/Pencahayaan/Pemupukan
Route::get('/history', [HistoryController::class, 'index'])->name('history');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Profil pengguna
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Edit profil
Route::get('/profile/edit', function () {
    return view('profile_edit');
})->name('profile.edit');



Route::get('/test-broadcast', function () {
    $dummy = SensorData::latest()->first();

    if ($dummy) {
        broadcast(new DataSensorUpdated($dummy))->toOthers();
        return 'Broadcast terkirim.';
    }

    return 'Tidak ada data sensor untuk broadcast.';
});





Route::get('/data-sensor', function () {
    return App\Models\Sensor::latest()->get();
});


Route::get('/sensor-latest', [SensorViewController::class, 'latest'])->name('sensor.latest');
Route::post('/sensor-data', [SensorDataController::class, 'store'])->name('sensor.store');

