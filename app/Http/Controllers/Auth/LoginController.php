<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LoginController  extends Controller
{
    public function index()
    {
        
    }
    public function store(Request $request)
    {
        $request->validate([

            'email'=>'required',
            'Password'=>'required',

        ],
        [
 
            'email.required'=>'El Email debe ser completado',
            'Password.required'=>'La contraseña no puede quedar vacía',
        ]);
       
       
       return redirect()
                // redirije al la vista de las escuelas
       ->route('xxx.index')
       ->with('feedback.message', 'Te as reguistrado exitosamente');
    }

    
}