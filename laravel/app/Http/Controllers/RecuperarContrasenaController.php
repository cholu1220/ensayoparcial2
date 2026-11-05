<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RecuperarContrasenaController extends Controller
{
    // Paso 1: el usuario manda correo + respuesta a la pregunta de seguridad
    public function recuperarContrasena(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'question' => 'required|string',
        'answer' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            "response" => $validator->errors()
        ], 400);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            "response" => "Este correo no existe"
        ], 404);
    }

    if ($request->question !== $user->question || $request->answer !== $user->answer) {
        return response()->json([
            "response" => "La pregunta o la respuesta de seguridad no coinciden"
        ], 401);
    }

    $user->password = $request->new_password;
    $user->save();

    return response()->json([
        "response" => "Contraseña actualizada exitosamente"
    ], 200);
}
}