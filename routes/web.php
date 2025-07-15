<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    RegisterController,
    DashboardController,
    AdminDashboardController,
    PemupukanController,
    HistoryController,
    WatteringController,
    PencahayaanController,
    SensorViewController,
    SensorController,
    AdminAuthController,
    DeviceController
};
use App\Http\Controllers\Api\SensorDataController;
use App\Models\SensorData;
use App\Events\DataSensorUpdated;

// ==================== AUTH ====================
Route::get('/ping', fn() => 'Laravel is OK');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==================== ADMIN AUTH ====================
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login_admin');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('login_admin.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ==================== DASHBOARD ====================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/latest-sensor', [DashboardController::class, 'latestSensor']); // <--- Realtime AJAX route
Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');

// ==================== DEVICE (ADMIN PROTECTED) ====================
Route::prefix('admin/devices')->name('admin.devices.')->middleware('auth:admin')->group(function () {
    Route::get('/', [DeviceController::class, 'index'])->name('index');
    Route::get('/create', [DeviceController::class, 'create'])->name('create');
    Route::post('/', [DeviceController::class, 'store'])->name('store');
    Route::get('/{device}/edit', [DeviceController::class, 'edit'])->name('edit');
    Route::put('/{device}', [DeviceController::class, 'update'])->name('update');
    Route::delete('/{device}', [DeviceController::class, 'destroy'])->name('destroy');
});

// ==================== MONITORING & SENSOR ====================

// ==================== PENGATURAN ====================
Route::view('/settings/watering', 'setting_wattering')->name('setting_wattering');
Route::post('/penyiraman/store', [WatteringController::class, 'store'])->name('penyiraman.store');

Route::view('/settings/lighting', 'setting_lighting')->name('setting_lighting');
Route::post('/setting_lighting/store', [PencahayaanController::class, 'store'])->name('setting_lighting.store');
Route::post('/pencahayaan/manual', [PencahayaanController::class, 'kontrolManual']);

Route::view('/settings/fertilization', 'pemupukan')->name('pemupukan');
Route::post('/pemupukan/store', [PemupukanController::class, 'store'])->name('pemupukan.store');

// ==================== HALAMAN TAMBAHAN ====================
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::view('/about', 'about')->name('about');
Route::view('/profil', 'profil')->name('profil');
Route::view('/profile', 'profile')->name('profile');
Route::view('/profile/edit', 'profile_edit')->name('profile.edit');

// ==================== BROADCAST TEST ====================
Route::get('/test-broadcast', function () {
    $dummy = SensorData::latest()->first();
    if ($dummy) {
        broadcast(new DataSensorUpdated($dummy))->toOthers();
        return 'Broadcast terkirim.';
    }
    return 'Tidak ada data sensor untuk broadcast.';
});

Route::get('/data-sensor', fn() => \App\Models\Sensor::latest()->get());
