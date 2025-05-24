<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioRolEscuela;

class UsuarioRolEscuelaController extends Controller
{
    public function index()
    {
        return UsuarioRolEscuela::with(['usuario', 'escuela'])->get();
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'Usuario_ID' => 'required|exists:users,ID_Usuario',
            'Escuela_ID' => 'required|exists:schools,ID_Escuela',
        ]);

        $asignacion = UsuarioRolEscuela::create([
            'Usuario_ID' => $request->Usuario_ID,
            'Escuela_ID' => $request->Escuela_ID,
        ]);

        return response()->json(['message' => 'Asignación guardada', 'institucion' => $asignacion], 201);
    } catch (\Exception $e) {
        // Mostramos el error exacto
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
}

}

