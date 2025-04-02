<!-- filepath: c:\xampp\htdocs\Laravel\consulta_dental\resources\views\appointments\edit.blade.php -->

@extends('layouts.app')

@section('title', 'Modificar Cita')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Cita</div>

                <div class="card-body">
                    <!-- Mostrar mensaje de éxito -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <p>Tu cita ha sido reprogramada para el día <strong>{{ session('new_date') }}</strong> a las <strong>{{ session('new_time') }}</strong>.</p>
                        </div>
                    @else
                        <!-- Mostrar mensajes de error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulario para modificar una cita -->
                        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}" id="edit-form">
                            @csrf

                            <!-- Campo para seleccionar la nueva fecha -->
                            <div class="form-group">
                                <label for="date">Nueva Fecha</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $appointment->date) }}" required>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para seleccionar la nueva hora -->
                            <div class="form-group">
                                <label for="time">Nueva Hora</label>
                                <select id="time" class="form-control @error('time') is-invalid @enderror" name="time" required>
                                    <option value="10:00" {{ old('time', $appointment->time) == '10:00' ? 'selected' : '' }}>10:00</option>
                                    <option value="11:00" {{ old('time', $appointment->time) == '11:00' ? 'selected' : '' }}>11:00</option>
                                    <option value="12:00" {{ old('time', $appointment->time) == '12:00' ? 'selected' : '' }}>12:00</option>
                                    <option value="13:00" {{ old('time', $appointment->time) == '13:00' ? 'selected' : '' }}>13:00</option>
                                    <option value="16:00" {{ old('time', $appointment->time) == '16:00' ? 'selected' : '' }}>16:00</option>
                                    <option value="17:00" {{ old('time', $appointment->time) == '17:00' ? 'selected' : '' }}>17:00</option>
                                    <option value="18:00" {{ old('time', $appointment->time) == '18:00' ? 'selected' : '' }}>18:00</option>
                                    <option value="19:00" {{ old('time', $appointment->time) == '19:00' ? 'selected' : '' }}>19:00</option>
                                </select>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Botón para enviar el formulario y guardar los cambios -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar mensaje de confirmación -->
<script>
    document.getElementById('edit-form').addEventListener('submit', function (e) {
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;

        // Mostrar mensaje de confirmación
        const confirmation = confirm(`¿Estás seguro de modificar la cita para el día ${date} a las ${time}?`);
        if (!confirmation) {
            e.preventDefault(); // Detener el envío del formulario si el usuario cancela
        }
    });
</script>
@endsection
