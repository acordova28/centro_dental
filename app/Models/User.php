<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // El nombre del usuario
        'email', // El correo electrónico del usuario
        'password', // La contraseña del usuario (hashed)
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Ocultar la contraseña al serializar el modelo
        'remember_token', // Ocultar el token de "recordar sesión" al serializar el modelo
    ];

    /**
     * Obtener los atributos que deben ser convertidos a tipos nativos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convertir el atributo 'email_verified_at' a un objeto DateTime
            'password' => 'hashed', // Indicar que el atributo 'password' está hasheado
        ];
    }

    /**
     * Relación uno a muchos con el modelo Appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
