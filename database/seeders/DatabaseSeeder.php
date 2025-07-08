<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun user biasa (jika belum ada)
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'username' => 'testuser',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        );

        // Buat akun admin (jika belum ada)
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
