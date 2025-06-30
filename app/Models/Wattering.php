<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wattering extends Model
{
    protected $fillable = [
        'min_humidity',
        'max_humidity',
        'mode',
        'jam_mulai',
        'jam_selesai',
    ];
}
