<?php

namespace App\Http\Controllers;

// Importa la fachada Auth para manejar la autenticación
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    // Muestra la página de bienvenida
    public function index()
    {
        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Retorna la vista 'welcome' y pasa el usuario autenticado a la vista
        return view('welcome', ['user' => $user]);
    }
}
