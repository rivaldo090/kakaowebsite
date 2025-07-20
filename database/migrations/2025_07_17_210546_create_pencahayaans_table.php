<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pencahayaans', function (Blueprint $table) {
            $table->id();
            $table->integer('intensitas');         // persentase intensitas pencahayaan (0-100)
            $table->time('jam_mulai');             // waktu mulai pencahayaan
            $table->time('jam_selesai');           // waktu selesai pencahayaan
            $table->timestamps();                  // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pencahayaans');
    }
};
