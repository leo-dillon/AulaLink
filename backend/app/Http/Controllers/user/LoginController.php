<?php

namespace App\Http\Controllers\user;

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
            $UserLogin = Auth::user();
            $datos = [
                'id'        => $UserLogin -> ID_Usuario,
                'firstName' => $UserLogin -> firstName,
                'lastName'  => $UserLogin -> lastName,
            ];
            return response() -> json([
                "message"   => "Sesión iniciada",
                "jwt"       => "Esto será un JWT",
                "datosUser" => $datos
            ], 200);
        }
        return response() -> json([
            'message' => 'Las cedenciales son incorrectas'
        ], 401);
    }

    public function logout(){
        Auth::logout();
        return response() -> json([
            'message' => 'Sisión cerrada'
        ]);
    }
}
