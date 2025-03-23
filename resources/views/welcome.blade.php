<!-- filepath: c:\xampp\htdocs\Laravel\consulta_dental\resources\views\welcome.blade.php -->

<!-- Extiende la plantilla base 'app.blade.php' -->
@extends('layouts.app')

<!-- Define el título de la página -->
@section('title', 'Welcome')

<!-- Define el contenido de la sección 'content' -->
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Panel lateral izquierdo -->
        <div class="col-md-3 bg-light">
            <h4>Panel de Control</h4>
            <ul class="nav flex-column">
                <!-- Enlace para reservar una cita -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.book') }}">Reservar Cita</a>
                </li>
                <!-- Enlace para actualizar la contraseña -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('password.change') }}">Actualizar Contraseña</a>
                </li>
            </ul>
        </div>
        <!-- Contenido principal -->
        <div class="col-md-9">
            <div id="main-content" class="py-5 bg-light">
                <!-- Muestra un mensaje de bienvenida con el nombre del usuario autenticado -->
                <h1 class="display-4">Welcome, {{ Auth::user()->name }}</h1>
                <p class="lead">Gracias por tu preferencia.</p>
                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    <!-- Token CSRF para proteger contra ataques CSRF -->
                    @csrf
                    <!-- Botón para enviar el formulario y cerrar sesión -->
                    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
