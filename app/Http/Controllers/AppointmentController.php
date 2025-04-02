<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Muestra el formulario para reservar una cita.
     */
    public function showBookingForm()
    {
        // Verifica si el usuario ya tiene una cita activa
        $activeAppointment = Appointment::where('user_id', auth()->id())
            ->where('status', 'activo')
            ->first();

        if ($activeAppointment) {
            // Redirigir al usuario con un mensaje de error si ya tiene una cita activa
            return redirect()->route('welcome')->withErrors(
                "Usted ya cuenta con una cita activa para el día {$activeAppointment->date} a las {$activeAppointment->time}."
            );
        }

        // Obtener todas las citas activas (opcional, para mostrar en el formulario)
        $activeAppointments = Appointment::where('status', 'activo')->get();

        // Mostrar el formulario para reservar una cita
        return view('appointments.book', compact('activeAppointments'));
    }

    /**
     * Procesa la reserva de una cita.
     */
    public function bookAppointment(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para realizar esta acción.');
        }

        // Validar los datos de la solicitud
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
        ]);

        // Verificar si la fecha seleccionada es un fin de semana
        $selectedDate = Carbon::parse($request->date);
        if ($selectedDate->isWeekend()) {
            return redirect()->back()->withErrors('Solo puedes reservar citas de lunes a viernes.');
        }

        // Verificar si la fecha y hora seleccionadas están disponibles
        $isAvailable = !Appointment::where('status', 'activo')
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if (!$isAvailable) {
            return redirect()->back()->withErrors('La fecha y hora seleccionadas no están disponibles.');
        }

        // Crear una nueva cita
        Appointment::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'activo',
            'rescheduled_at' => null,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('welcome')->with('success', 'La cita ha sido reservada exitosamente.');
    }

    /**
     * Muestra el formulario para modificar una cita.
     */
    public function edit()
    {
        // Obtener el usuario autenticado
        $userId = auth()->id();

        // Registrar información del usuario autenticado
        \Log::info('Iniciando validación para modificar cita.', [
            'user_id' => $userId,
        ]);

        // Buscar la cita asociada al usuario autenticado
        $appointment = Appointment::where('user_id', $userId)
            ->first();

        // Registrar información de la cita obtenida
        \Log::info('Cita obtenida:', [
            'appointment' => $appointment,
        ]);

        // Verificar si la cita existe
        if (!$appointment) {
            \Log::warning('No se encontró una cita asociada al usuario.', [
                'user_id' => $userId,
            ]);
            return redirect()->route('welcome')->withErrors('Actualmente usted no tiene una cita registrada.');
        }

        // Primera validación: Verificar si la cita está activa
        if ($appointment->status !== 'activo') {
            \Log::warning('Validación fallida: La cita no está activa.', [
                'user_id' => $userId,
                'status' => $appointment->status,
            ]);
            return redirect()->route('welcome')->withErrors('Actualmente usted no tiene cita activa.');
        }

        // Segunda validación: Verificar si la cita no ha sido reprogramada
        if ($appointment->rescheduled_at !== null) {
            \Log::warning('Validación fallida: La cita ya fue reprogramada.', [
                'user_id' => $userId,
                'rescheduled_at' => $appointment->rescheduled_at,
            ]);
            return redirect()->route('welcome')->withErrors('Usted ya modificó su cita anteriormente, no puede hacerlo otra vez.');
        }

        // Registrar que la cita cumple con las condiciones
        \Log::info('Validación exitosa: La cita está activa y no ha sido reprogramada.', [
            'user_id' => $userId,
        ]);

        // Si pasa ambas validaciones, mostrar el formulario
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Procesa la modificación de la cita.
     */
    public function update(Request $request, $id)
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para realizar esta acción.');
        }

        // Obtener el usuario autenticado
        $userId = auth()->id();

        // Buscar la cita asociada al usuario autenticado
        $appointment = Appointment::where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$appointment) {
            return redirect()->route('welcome')->withErrors('Actualmente usted no tiene una cita registrada.');
        }

        // Validar los datos de la solicitud
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
        ]);

        // Verificar si la fecha seleccionada es un fin de semana
        $selectedDate = Carbon::parse($request->date);
        if ($selectedDate->isWeekend()) {
            return redirect()->back()->withErrors('Solo puedes reprogramar citas de lunes a viernes.');
        }

        // Verificar si la fecha y hora seleccionadas están disponibles
        $isAvailable = !Appointment::where('status', 'activo')
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if (!$isAvailable) {
            return redirect()->back()->withErrors('La fecha y hora seleccionadas no están disponibles.');
        }

        // Actualizar la cita
        $appointment->update([
            'date' => $request->date,
            'time' => $request->time,
            'rescheduled_at' => now(),
        ]);

        // Redirigir al usuario con un mensaje de éxito en la página welcome
        return redirect()->route('welcome')
            ->with('success', "La cita ha sido reprogramada exitosamente para el día {$request->date} a las {$request->time}.");
    }
}
