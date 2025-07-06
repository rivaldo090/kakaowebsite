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
    Schema::create('sensor_data', function (Blueprint $table) {
        $table->id();
        $table->float('temperature');
        $table->float('humidity');
        $table->float('soil_moisture');
        $table->string('lamp_status');
        $table->string('water_pump');
        $table->string('fertilizer');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
