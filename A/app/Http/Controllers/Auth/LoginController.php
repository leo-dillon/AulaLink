<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController  extends Controller
{
    public function login()
    {
        return view('auth.login.index');
    }
    public function authenticate(Request $request)
    {
        $request->validate([

            'email'=>'required',
            'password'=>'required',

        ],
        [
 
            'email.required'=>'El Email debe ser completado',
            'password.required'=>'La contraseña no puede quedar vacía',
        ]);
       
       $credentials = $request->only(['email','password']);
       if (Auth::attempt($credentials)) {
        return redirect()
        ->intended(route('home.index'))
        ->with('feedback.message', 'Sesion iniciada con exito');

       }
       return redirect()
        ->back()
        ->withInput()
        ->with('feedback.message', 'Las credenciales no coinciden');
    }
   public function logout(Request $request){
    Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     return redirect('/')
        
        ->with('feedback.message', 'Sesion cerrada con exito');
}
    
}