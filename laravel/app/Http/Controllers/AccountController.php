<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    private $token;
        public function __construct(){
            $this-> token = env('TOKEN');
        }

    public function example(Request $request)
    {
        $response = Http::post('http://localhost:5001/example', [
            "data" => "Mensaje enviado desde laravel",    
            'token' => $this->token
        ]);

       return response ()->json($response->json());
    }
}