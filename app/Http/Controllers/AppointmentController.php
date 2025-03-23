<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Muestra el formulario de reserva de citas
    public function showBookingForm()
    {
        // Verificar si el usuario ya tiene una cita futura
        $existingAppointment = Appointment::where('user_id', Auth::id())
            ->where('date', '>=', Carbon::today())
            ->first();

        if ($existingAppointment) {
            return view('appointments.book', ['existingAppointment' => $existingAppointment]);
        }

        return view('appointments.book');
    }

    // Maneja la reserva de citas
    public function bookAppointment(Request $request)
    {
        $messages = [
            'date.after' => 'El campo fecha debe ser una fecha posterior a hoy.',
            'date.required' => 'El campo fecha es obligatorio.',
            'time.required' => 'El campo hora es obligatorio.',
            'time.date_format' => 'El campo hora debe tener el formato HH:MM.',
        ];

        $request->validate([
            'date' => 'required|date|after:today', // La fecha debe ser posterior al día actual
            'time' => 'required|date_format:H:i',
        ], $messages);

        // Validar que la fecha sea de lunes a viernes
        $date = Carbon::parse($request->date);
        if ($date->isWeekend()) {
            return redirect()->back()->withErrors(['date' => 'Solo se pueden reservar citas de lunes a viernes.'])->withInput();
        }

        // Validar que la hora esté dentro de las franjas horarias permitidas
        $allowedTimes = ['10:00', '11:00', '12:00', '13:00', '16:00', '17:00', '18:00', '19:00'];
        if (!in_array($request->time, $allowedTimes)) {
            return redirect()->back()->withErrors(['time' => 'La hora seleccionada no está dentro de las franjas horarias permitidas.'])->withInput();
        }

        // Validar que la franja horaria no esté ocupada
        $existingAppointment = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->withErrors(['time' => 'La franja horaria seleccionada ya está ocupada.'])->withInput();
        }

        // Guardar la cita
        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return redirect()->route('welcome')->with('success', 'Cita reservada correctamente.');
    }
}
