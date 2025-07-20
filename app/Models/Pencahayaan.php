<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencahayaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'intensitas',
        'jam_mulai',
        'jam_selesai',
    ];
}
