<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * Kolom yang bisa diisi secara massal.
     */
    protected $fillable = [
        'username',
        'email',
        'password', // Harus disimpan dalam bentuk bcrypt
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat di-serialize (misalnya ke JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Kolom bertipe tanggal.
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Cek apakah user memiliki role tertentu.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Cek apakah user adalah admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
