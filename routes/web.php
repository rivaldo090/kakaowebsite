<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\AdminDashboardController; // <- Tambahan controller admin

// Halaman login awal
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Login & Register
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'loginSubmit'])->name('login.submit');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.submit');

// Dashboard untuk user biasa
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard untuk admin (menggunakan controller)
Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// (Opsional) Route tambahan untuk admin jika ada daftar user & device
Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
Route::get('/admin/devices', [AdminDashboardController::class, 'devices'])->name('admin.devices');


// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Halaman History
Route::get('/history', function () {
    return view('history');
})->name('history');

// Profil pengguna
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Edit profil pengguna
Route::get('/profile/edit', function () {
    return view('profile_edit');
})->name('profile.edit');

// Halaman pengaturan penyiraman
Route::get('/settings/watering', function () {
    return view('settings.watering');
})->name('settings.watering');

// Halaman pengaturan pencahayaan
Route::get('/settings/lighting', function () {
    return view('settings.lighting');
})->name('settings.lighting');

// Halaman pengaturan pemberian pupuk
Route::get('/settings/fertilization', function () {
    return view('settings.fertilization');
})->name('settings.fertilization');

// dht11

Route::post('/terima-suhu', [SensorController::class, 'terimaSuhu']);