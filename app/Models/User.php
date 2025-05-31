<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    protected $table = 'user';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'pass',
        'email',
        'role',
    ];

    protected $hidden = [
        'pass',
    ];

    public function getAuthPassword()
    {
        return $this->pass;
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // ✅ Tambahkan ini
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
