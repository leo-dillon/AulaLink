<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosRol;
use App\Models\UsuarioRolEscuela;
use App\Models\Role;

class DatosRolController extends Controller
{
    // Obtener los campos definidos para el rol asociado a un usuario
   public function obtenerCampos($idUserRolEscuela)
{
    // Buscamos el registro en usuario_rol_escuela
    $usuarioRol = UsuarioRolEscuela::find($idUserRolEscuela);

    if (!$usuarioRol) {
        return response()->json(['error' => 'UsuarioRolEscuela no encontrado'], 404);
    }

    // Obtenemos el ID_Rol
    $rol = Role::find($usuarioRol->Rol_ID);

    if (!$rol) {
        return response()->json(['error' => 'Rol no encontrado'], 404);
    }

    $definicion = json_decode($rol->Definicion, true);
    $campos = $definicion['campos'] ?? [];

    return response()->json([
        'rol' => $rol->Nombre,
        'campos' => $campos
    ]);
}


    // Guardar los datos rellenados por el usuario para ese rol
    public function store(Request $request)
    {
        $request->validate([
            'ID_UserRolEscuela' => 'required|exists:usuario_rol_escuela,ID_UserRolEscuela',
            'Datos' => 'required|array',
        ]);

        $datosRol = new DatosRol();
        $datosRol->ID_UserRolEscuela = $request->ID_UserRolEscuela;
        $datosRol->Datos = json_encode($request->Datos);
        $datosRol->save();

        return response()->json(['message' => 'Datos guardados correctamente']);
    }
}
