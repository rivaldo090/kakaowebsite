<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('histories', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal');
    $table->string('jenis'); // contoh: pemupukan, penyiraman, pencahayaan
    $table->time('jam_mulai');
    $table->time('jam_selesai');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
