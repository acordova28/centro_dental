<?php

// Define el espacio de nombres para el controlador
namespace App\Http\Controllers;

// Importa la clase Request de Laravel, que se usa para manejar solicitudes HTTP
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Método que maneja la solicitud GET para la página de inicio
    public function index()
    {
        // Retorna la vista 'home' cuando se accede a la ruta de inicio
        return view('home');
    }
}
