<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    // Nama tabel (opsional jika nama tabel mengikuti konvensi "pupuks")
    protected $table = 'pemupukans';

    // Field yang boleh diisi (mass assignable)
   protected $fillable = ['jenis_pupuk', 'jumlah', 'tanggal'];

    // Jika tidak menggunakan timestamps (created_at & updated_at), hapus komentar di bawah
    // public $timestamps = false;
}
