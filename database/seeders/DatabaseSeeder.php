<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun user biasa
        User::create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        // Buat akun admin
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
