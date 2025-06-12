<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories'; // pastikan sama dengan nama tabel di database

    protected $fillable = [
        'tanggal',
        'jenis',
        'jam_mulai',
        'jam_selesai',
    ];
}
