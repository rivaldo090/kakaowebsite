<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    protected $table = 'komponens';

    protected $fillable = [
        'lampu',
        'penyiraman',
        'pemupukan'
    ];
}
