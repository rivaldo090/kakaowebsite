<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // ✅ Tambahkan method ini agar route login GET bisa bekerja
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'pass' => ['required'],
        ]);

        // Karena field password di form bernama "pass", kita map ke "password"
        $credentials = [
            'username' => $request->username,
            'password' => $request->pass,
        ];

if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    session()->flash('success', 'Login sukses!');

    // Ambil user yang login
    $user = Auth::user();

    // Cek berdasarkan user_id atau role
    if ($user->id == 2 || $user->role === 'admin') {
        return redirect()->route('dashboard'); // route ke dashboard admin
    } else {
        return redirect()->route('dashboard'); // route ke dashboard user biasa
    }
}


        return back()->with('error', 'Username atau password salah!');
    }

    // ✅ Tambahkan logout agar bisa dipakai di route
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}