<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelembapanTanah extends Model
{
    protected $table = 'kelembapan_tanah'; // <--- tambahkan baris ini

    protected $fillable = ['nilai'];
}
