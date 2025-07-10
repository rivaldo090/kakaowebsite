<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->float('suhu');
            $table->float('kelembaban_udara');
            $table->float('kelembaban_tanah');
            $table->string('status_lampu')->nullable();
            $table->string('status_pemupukan')->nullable();
            $table->string('status_penyiraman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Kembalikan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data'); // ✅ perbaikan dari 'sensor_datas'
    }
};
