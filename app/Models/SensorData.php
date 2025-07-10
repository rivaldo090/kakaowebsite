<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'sensor_data';

    protected $fillable = [
        'suhu',
        'kelembaban_udara',
        'kelembaban_tanah',
        'status_lampu',
        'status_pemupukan',
        'status_penyiraman',
    ];
}
