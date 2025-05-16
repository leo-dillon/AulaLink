<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class EditarController  extends Controller
{
   public function edit(int $id)
    {
       return view('auth.UserEdit',[
              'user'=> User::findOrFail($id)
        ]);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
        'name' => 'required|min:2',
        'lastName' => 'required|min:2',
        'gender' => 'required',
        'birthdate' => 'required|date',
        'dni' => 'required|min:7',
        'email' => 'required|email',
        'address' => 'required',
        'foto' => 'nullable|image|max:2048',
    ], [
        'name.required' => 'El nombre debe ser completado',
        'name.min' => 'El nombre debe tener más de 2 caracteres',

        'lastName.required' => 'El apellido debe ser completado',
        'lastName.min' => 'El apellido debe tener más de 2 caracteres',

        'gender.required' => 'El género debe ser completado',
        'birthdate.required' => 'La fecha de nacimiento debe ser completada',

        'dni.required' => 'El DNI debe ser completado',
        'dni.min' => 'El DNI debe tener más de 6 caracteres',
        

        'email.required' => 'El Email debe ser completado',
        'email.email' => 'El Email no es válido',

        'address.required' => 'La dirección debe ser completada',
    ]);

     // Buscar usuario existente
     $user = User::findOrFail($id);
    
    $user->name = $request->name;
    $user->lastName = $request->lastName;
    $user->gender = $request->gender;
    $user->birthdate = $request->birthdate;
    $user->dni = $request->dni;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->asset = true;
    $user->creationDate = now();

    // Foto si existe
    if ($request->hasFile('foto')) {
         $ruta = $request->file('foto')->store('imagenes', 'public');
        $user->photo = $ruta;
    }else {
                $user->photo = null; 

    }

    $user->save();

    return redirect()
        ->route('home.index')
        ->with('feedback.message', 'Has editado el usuario exitosamente.');
    }
    
}