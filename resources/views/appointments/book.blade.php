<!-- filepath: c:\xampp\htdocs\Laravel\consulta_dental\resources\views\appointments\book.blade.php -->

@extends('layouts.app')

@section('title', 'Reservar Cita')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservar Cita</div>

                <div class="card-body">
                    @if (isset($existingAppointment))
                        <!-- Mensaje si el usuario ya tiene una cita futura -->
                        <div class="alert alert-info">
                            Ya tienes una cita reservada para el {{ $existingAppointment->date }} a las {{ $existingAppointment->time }}. No puedes reservar otra cita hasta que esta haya sido atendida.
                        </div>
                    @else
                        <!-- Formulario para reservar una cita -->
                        <form method="POST" action="{{ route('appointments.book.store') }}">
                            @csrf

                            <!-- Campo para seleccionar la fecha -->
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>

                                <!-- Muestra un mensaje de error si hay problemas con la fecha -->
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para seleccionar la hora -->
                            <div class="form-group">
                                <label for="time">Hora</label>
                                <select id="time" class="form-control @error('time') is-invalid @enderror" name="time" required>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                </select>

                                <!-- Muestra un mensaje de error si hay problemas con la hora -->
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Botón para enviar el formulario y reservar la cita -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Reservar Cita
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
