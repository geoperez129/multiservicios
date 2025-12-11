<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'active',
    ];

    // Un servicio tiene muchos técnicos
    public function technicians()
    {
        return $this->hasMany(Technician::class);
    }
}
