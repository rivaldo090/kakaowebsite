<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupuksTable extends Migration
{
    public function up()
    {
        Schema::create('pupuk', function (Blueprint $table) {
    $table->id();
    $table->string('jenis_pupuk');
    $table->integer('jumlah');
    $table->date('tanggal');
    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('pupuks');
    }
}
