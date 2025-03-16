<?php

namespace App\Http\Controllers\Auth;

// Importa el controlador base de Laravel
use App\Http\Controllers\Controller;

// Importa la clase Request para manejar las solicitudes HTTP
use Illuminate\Http\Request;

// Importa la fachada Auth para manejar la autenticación
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        // Retorna la vista 'auth.login' que contiene el formulario de inicio de sesión
        return view('auth.login');
    }

    // Procesa los datos del formulario de inicio de sesión
    public function login(Request $request)
    {
        // Obtiene las credenciales (email y password) del request
        $credentials = $request->only('email', 'password');

        // Intenta autenticar al usuario con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirige a la página de bienvenida con un mensaje de éxito
            return redirect()->intended('welcome')->with('success', '¡Inicio de sesión exitoso!');
        }

        // Si la autenticación falla, redirige de vuelta al formulario de login con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->with('error', 'Error en el inicio de sesión. Por favor, verifica tus credenciales e intenta nuevamente.');
    }

    // Cierra la sesión del usuario
    public function logout(Request $request)
    {
        // Cierra la sesión del usuario
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();

        // Regenera el token de la sesión para evitar ataques CSRF
        $request->session()->regenerateToken();

        // Redirige al formulario de login con un mensaje de éxito
        return redirect()->route('login')->with('success', '¡Sesión cerrada exitosamente!');
    }
}
