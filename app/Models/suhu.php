<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    use HasFactory;

    protected $table = 'suhu'; // Pastikan ini sesuai dengan nama tabel di database
    protected $fillable = ['nilai'];
}
