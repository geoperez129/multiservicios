<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
    'email_verified_at' => 'datetime',
    'last_login_at' => 'datetime',
];


    // 🔥 Relación: un usuario puede tener un perfil de técnico
    public function technician()
    {
        return $this->hasOne(Technician::class);
    }
    public function ratingsGiven()
{
    return $this->hasMany(\App\Models\Rating::class);
}

}
