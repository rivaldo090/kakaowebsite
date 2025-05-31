<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelembapanTanahTable extends Migration
{
    public function up(): void
    {
        Schema::create('kelembapan_tanah', function (Blueprint $table) {
            $table->id();
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelembapan_tanah');
    }
}
