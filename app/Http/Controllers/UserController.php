<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users,email',
            'contrasena' => 'required|string|min:6|confirmed',
        ]);

        // Creación del nuevo usuario
        $user = User::create([
            'name' => $validated['nombre'],
            'email' => $validated['correo'],
            'password' => Hash::make($validated['contrasena']),
        ]);

        // Respuesta JSON con nombre, correo y mensaje de éxito
        return response()->json([
            'success' => 'Cuenta creada con éxito.',
            'nombre' => $user->name,
            'correo' => $user->email,
        ]);
    }
}
