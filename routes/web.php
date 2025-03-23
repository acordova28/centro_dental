<?php

// Importa el LoginController desde el namespace App\Http\Controllers\Auth
use App\Http\Controllers\Auth\LoginController;

// Importa el RegisterController desde el namespace App\Http\Controllers\Auth
use App\Http\Controllers\Auth\RegisterController;

// Importa el WelcomeController desde el namespace App\Http\Controllers
use App\Http\Controllers\WelcomeController;

// Importa el HomeController desde el namespace App\Http\Controllers
use App\Http\Controllers\HomeController;

// Importa el PasswordController desde el namespace App\Http\Controllers
use App\Http\Controllers\PasswordController;

// Importa la clase Route desde el namespace Illuminate\Support\Facades
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;

// Ruta para mostrar el formulario de login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login
Route::post('login', [LoginController::class, 'login']);

// Ruta para mostrar el formulario de registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('register', [RegisterController::class, 'register']);

// Ruta para mostrar la página de bienvenida, protegida por middleware de autenticación
Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome')->middleware('auth');

// Ruta para procesar el logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para la página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para mostrar el formulario de actualización de contraseña
Route::get('password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change')->middleware('auth');

// Ruta para procesar la actualización de contraseña
Route::post('password/change', [PasswordController::class, 'changePassword'])->name('password.update')->middleware('auth');

// Ruta para mostrar el formulario de reserva de citas
Route::get('appointments/book', [AppointmentController::class, 'showBookingForm'])->name('appointments.book')->middleware('auth');

// Ruta para procesar la reserva de citas
Route::post('appointments/book', [AppointmentController::class, 'bookAppointment'])->name('appointments.book.store')->middleware('auth');
