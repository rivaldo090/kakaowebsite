<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom 'role' ke tabel users.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password'); // atau sesuaikan posisi kolom jika perlu
        });
    }

    /**
     * Menghapus kolom 'role' saat rollback.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
