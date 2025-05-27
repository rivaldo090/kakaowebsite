<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerSubmit(Request $request)
    {

        
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'pass' => Hash::make($request->password), // simpan hash password di kolom pass
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function index()
    {
        return view('auth.register');
    }

        public function store(Request $request)
    {
        // Validasi input
            $request->validate([
                'username' => 'required|string|max:50|unique:user,username',
                'email' => 'required|email|unique:user,email',
                'password' => 'required|min:6|confirmed',
            ]);


        // Simpan user baru
        DB::table('user')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'pass' => Hash::make($request->password),
            'role' => 'user', // default role
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }
}
