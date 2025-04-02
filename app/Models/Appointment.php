<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'status',
        'rescheduled_at',
    ];

    /**
     * Relación con el modelo User.
     * Una cita pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
