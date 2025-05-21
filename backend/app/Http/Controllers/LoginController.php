<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $request -> validate([
            'email'     => 'required', 
            'password'  => 'required', 
        ],
        [
            'email.required'    => 'El Email debe ser completado',
            'password.required' => 'La contraseña no puede quedar vacía',
        ]);
        $credentials = $request -> only(['email', 'password']);
        if(Auth::attempt($credentials)){
            return response() -> json([
                "message"   => "Sesión iniciada",
                "jwt"       => "Esto será un JWT"
            ], 200);
        }
        return response() -> json([
            'message' => 'Las cedenciales son incorrectas'
        ], 401);
    }
}
