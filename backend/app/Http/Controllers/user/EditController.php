<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function editUser(Request $request, int $id){
        $request->validate([
            'birthdate' => 'required|date',
            'firstName' => 'required|min:2',
            'lastName'  => 'required|min:2',
            'address'   => 'required',
            'gender'    => 'required',
            'photo'      => 'nullable|image|max:2048',
            'dni'       => 'required|min:7',
        ], [
            'firstName.required'    => 'El nombre debe ser completado',
            'firstName.min'         => 'El nombre debe tener más de 2 caracteres',

            'lastName.required'     => 'El apellido debe ser completado',
            'lastName.min'          => 'El apellido debe tener más de 2 caracteres',

            'birthdate.required'    => 'La fecha de nacimiento debe ser completada',
            'gender.required'       => 'El género debe ser completado',

            'dni.required'          => 'El DNI debe ser completado',
            'dni.min'               => 'El DNI debe tener más de 6 caracteres',

            'address.required'      => 'La dirección debe ser completada',
        ]);

        $user = User::findOrFail($id);
        $user->firstName    = $request->firstName;
        $user->birthdate    = $request->birthdate;
        $user->lastName     = $request->lastName;
        $user->address      = $request->address;
        $user->gender       = $request->gender;
        $user->photo        = $request->photo;
        $user->dni          = $request->dni;
        if ($request->hasFile('photo')) {
            $ruta = $request->file('photo')->store('imagenes', 'public');
            $user->photo    = $ruta;
        }else {
            $user->photo    = null; 
        }
        $user->save();
        return response() -> json([
            "Mensaje"   => "El usuario fue editado",
            "dato"      => $request
        ]);
    }
}
