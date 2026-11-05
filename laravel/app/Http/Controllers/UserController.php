<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $user= User::create($request->all());
        return response()->json($user, 201);
    }

    public function login(Request $request){
        $user= User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                "response"=> "Este correo no existe"], 404);
        }
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                "response"=> "Credenciales incorrectas"], 401);
        }
        $token= $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            "user"=> $user,
            "token"=> $token,
            "response"=> "Login exitoso"
        ], 200);
    }

    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        "response" => "Logout exitoso"
    ], 200);
}
}
