<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
class RegisterController  extends Controller
{
    public function index() 
    {
        // trae todos los datos de la vase
          $Login = User::all();
        return view('xxx.index',[
            'admins'=> $Login
        ]);
    }
    public function create(){
         return view('auth.register.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:2',
        'lastName' => 'required|min:2',
        'gender' => 'required',
        'birthdate' => 'required|date',
        'dni' => 'required|min:7|unique:users,dni',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
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
        'dni.unique' => 'Este DNI ya está registrado',

        'email.required' => 'El Email debe ser completado',
        'email.email' => 'El Email no es válido',
        'email.unique' => 'Este Email ya está registrado',

        'password.required' => 'La contraseña no puede quedar vacía',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres',

        'address.required' => 'La dirección debe ser completada',
    ]);

    // Creamos el nuevo usuario
    $user = new User();
    
    $user->name = $request->name;
    $user->lastName = $request->lastName;
    $user->gender = $request->gender;
    $user->birthdate = $request->birthdate;
    $user->dni = $request->dni;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password); // Encriptar
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
        ->with('feedback.message', 'Te has registrado exitosamente.');
}

    
}