<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioRolEscuela;
use App\Models\Role;
class UsuarioRolEscuelaController extends Controller
{
    public function index()
    {
        return UsuarioRolEscuela::with(['usuario', 'escuela', 'rol'])->get();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'Usuario_ID' => 'required|exists:users,ID_Usuario',
                'Escuela_ID' => 'required|exists:schools,ID_Escuela',
                'Rol_ID' => 'required|exists:roles,ID_Rol',
            ]);
            $yaExiste = UsuarioRolEscuela::where('Usuario_ID', $request->Usuario_ID)
                ->where('Escuela_ID', $request->Escuela_ID)
                ->where('Rol_ID', $request->Rol_ID)
                ->exists();
            if ($yaExiste) {
                return response()->json(['message' => 'Ya existe una asignación con esos mismos datos.'], 409);
            }
            $asignacion = UsuarioRolEscuela::create([
                'Usuario_ID' => $request->Usuario_ID,
                'Escuela_ID' => $request->Escuela_ID,
                'Rol_ID' => $request->Rol_ID,
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

