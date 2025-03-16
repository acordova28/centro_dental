<?php

namespace App\Http\Controllers\Auth;

// Importa el controlador base de Laravel
use App\Http\Controllers\Controller;

// Importa el modelo User para interactuar con la tabla de usuarios
use App\Models\User;

// Importa la clase Request para manejar las solicitudes HTTP
use Illuminate\Http\Request;

// Importa la fachada Hash para encriptar contraseñas
use Illuminate\Support\Facades\Hash;

// Importa la fachada Auth para manejar la autenticación
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra el formulario de registro
    public function showRegistrationForm()
    {
        // Retorna la vista 'auth.register' que contiene el formulario de registro
        return view('auth.register');
    }

    // Procesa los datos del formulario de registro
    public function register(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea un nuevo usuario con los datos validados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autentica al usuario recién registrado
        Auth::login($user);

        // Redirige a la página de bienvenida con un mensaje de éxito
        return redirect()->route('welcome')->with('success', '¡Registro exitoso!');
    }
}
