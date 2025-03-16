<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', // El nombre del usuario
        'email', // El correo electrónico del usuario
        'password', // La contraseña del usuario (hashed)
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var list<string>
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
}
