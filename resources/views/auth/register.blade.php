<!-- Extiende la plantilla base 'app.blade.php' -->
@extends('layouts.app')

<!-- Define el título de la página -->
@section('title', 'Register')

<!-- Define el contenido de la sección 'content' -->
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <!-- Formulario de registro -->
                <form method="POST" action="{{ route('register') }}">
                    <!-- Token CSRF para proteger contra ataques CSRF -->
                    @csrf
                    <!-- Campo de entrada para el nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Campo de entrada para el email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <!-- Campo de entrada para la contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Campo de entrada para la confirmación de la contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <!-- Muestra los errores de validación si existen -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
