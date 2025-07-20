<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemupukansTable extends Migration
{
    public function up()
    {
        Schema::create('pemupukans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pupuk');
            $table->integer('jumlah'); // dalam gram/ml
            $table->date('tanggal_pemupukan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemupukans');
    }
}
