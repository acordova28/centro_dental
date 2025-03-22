<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    // Muestra el formulario de actualización de contraseña
    public function showChangePasswordForm()
    {
        // Retorna la vista 'auth.passwords.change' cuando se accede a la ruta de cambio de contraseña
        return view('auth.passwords.change');
    }

    // Maneja la actualización de la contraseña
    public function changePassword(Request $request)
    {
        // Validación de los campos del formulario
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Si la validación falla, redirige de vuelta con los errores y los datos ingresados
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualiza la contraseña del usuario autenticado
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirige a la página de bienvenida con un mensaje de éxito
        return redirect()->route('welcome')->with('success', 'Contraseña actualizada correctamente.');
    }
}
