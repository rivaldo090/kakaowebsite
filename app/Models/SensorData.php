<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $fillable = [
        'temperature',
        'humidity',
        'soil_moisture',
        'lamp_status',
        'water_pump',
        'fertilizer',
    ];
}