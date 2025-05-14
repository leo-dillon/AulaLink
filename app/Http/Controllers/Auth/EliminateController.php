<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
class EliminateController  extends Controller
{
   public function destroy(int $id)
    {
        $input = User::findOrFail($id);
        
        $input->delete();

        return redirect()
        ->route('home.index')
        ->with('feedback.message', 'El Articulo <b>'. ($input['titulo']) .'</b> se elimino exitosamente.');
    }
    
}