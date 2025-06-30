<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencahayaan extends Model
{
    protected $fillable = [
        'intensitas',
        'jam_mulai',
        'jam_selesai',
    ];
}
