@extends('layouts.app')

@section('title', 'Actualizar Contraseña')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar Contraseña</div>

                <div class="card-body">
                    <!-- Formulario para actualizar la contraseña -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Campo para la nueva contraseña -->
                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            <!-- Muestra un mensaje de error si hay problemas con la nueva contraseña -->
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo para confirmar la nueva contraseña -->
                        <div class="form-group">
                            <label for="password-confirm">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Botón para enviar el formulario y actualizar la contraseña -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">
                                Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
