<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('jenis'); // pencahayaan / penyiraman / pemupukan
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable(); // <== WAJIB nullable
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
