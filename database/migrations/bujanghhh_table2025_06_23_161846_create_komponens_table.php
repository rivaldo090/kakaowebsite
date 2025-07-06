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
    Schema::create('komponens', function (Blueprint $table) {
        $table->id();
        $table->enum('lampu', ['Aktif', 'Nonaktif'])->default('Nonaktif');
        $table->enum('pemupukan', ['Aktif', 'Nonaktif'])->default('Nonaktif');
        $table->enum('penyiraman', ['Aktif', 'Nonaktif'])->default('Nonaktif');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponens');
    }
};
