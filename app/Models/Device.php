<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';
    protected $primaryKey = 'device_id';

    // Jika device_id bukan auto increment, uncomment baris berikut
    // public $incrementing = false;

    protected $fillable = [
        'device_name',
        'device_type',
        'device_status',
        'user_id',
    ];

    /**
     * Relasi: Device dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
