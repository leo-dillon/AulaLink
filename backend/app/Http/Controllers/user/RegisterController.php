<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function store(Request $request){
        $request -> validate([
            'firstName' => 'required|min:2',
            'lastName'  => 'required|min:2',
            'gender'    => 'required',
            'birthdate' => 'required|date',
            'dni'       => 'required|min:7|unique:users,dni',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'address'   => 'required',
            'img'       => 'nullable|img|max:2048'
        ], [
            'fisrtName.required'      => 'El nombre debe ser completado',
            'fisrtName.min'           => 'El nombre debe tener más de 2 caracteres',

            'lastName.required'  => 'El apellido debe ser completado',
            'lastName.min'       => 'El apellido debe tener más de 2 caracteres',

            'birthdate.required' => 'La fecha de nacimiento debe ser completada',
            'gender.required'    => 'El género debe ser completado',

            'dni.required'       => 'El DNI debe ser completado',
            'dni.unique'         => 'Este DNI ya está registrado',
            'dni.min'            => 'El DNI debe tener más de 6 caracteres',

            'email.required'     => 'El Email debe ser completado',
            'email.unique'       => 'Este Email ya está registrado',
            'email.email'        => 'El Email no es válido',

            'password.required'  => 'La contraseña no puede quedar vacía',
            'password.min'       => 'La contraseña debe tener al menos 6 caracteres',

            'address.required'   => 'La dirección debe ser completada',
        ]);

        $user = new User();
        $user -> firstName      = $request -> firstName;
        $user -> lastName       = $request -> lastName;
        $user -> gender         = $request -> gender;
        $user -> birthdate      = $request -> birthdate;
        $user -> dni            = $request -> dni;
        $user -> email          = $request -> email;
        $user -> address        = $request -> address;
        $user -> phone          = $request -> phone;
        $user -> password       = Hash::make($request -> password);
        $user -> asset          = true;
        $user -> creationDate   = now();
        $user -> save();

        return response() -> json([
            'message' => 'El usuario fue registrado',
            'request' => $user
        ], 200);
    }
}