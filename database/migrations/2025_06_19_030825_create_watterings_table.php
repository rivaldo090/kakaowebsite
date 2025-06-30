<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('watterings', function (Blueprint $table) {
            $table->id();
            $table->integer('min_humidity');         // kelembapan minimum
            $table->integer('max_humidity');         // kelembapan maksimum
            $table->enum('mode', ['otomatis', 'manual'])->default('otomatis'); // mode penyiraman
            $table->time('jam_mulai')->nullable();   // waktu mulai penyiraman
            $table->time('jam_selesai')->nullable(); // waktu selesai penyiraman
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('watterings');
    }
};
