<!-- Extiende la plantilla base 'app.blade.php' -->
@extends('layouts.app')

<!-- Define el título de la página -->
@section('title', 'Welcome')

<!-- Define el contenido de la sección 'content' -->
@section('content')
    <div class="jumbotron">
        <!-- Muestra un mensaje de bienvenida con el nombre del usuario autenticado -->
        <h1 class="display-4">Welcome, {{ $user->name }}</h1>
        <p class="lead">Gracias por tu preferencia.</p>
        <!-- Formulario para cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}">
            <!-- Token CSRF para proteger contra ataques CSRF -->
            @csrf
            <!-- Botón para enviar el formulario y cerrar sesión -->
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
@endsection
