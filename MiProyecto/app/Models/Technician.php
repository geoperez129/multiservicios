<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'specialty',
        'phone',
        'city',
        'image',
        'description',
    ];

    // RELACIÓN CON USERS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELACIÓN CON SERVICE
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
