<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemupukan extends Model
{
    protected $fillable = [
        'jenis_pupuk',
        'jumlah',
        'tanggal_pemupukan',
    ];
}
