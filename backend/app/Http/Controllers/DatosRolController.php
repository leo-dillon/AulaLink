<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosRol;
use App\Models\UsuarioRolEscuela;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class DatosRolController extends Controller
{
    // Obtener los campos definidos para el rol asociado a un usuario
   public function obtenerCampos($idUsuario)
{
    $usuarioRol = DB::table('usuario_rol_escuela')
        ->where('Usuario_ID', $idUsuario)
        ->first();

    if (!$usuarioRol) {
        return response()->json(['error' => 'Usuario sin rol asignado'], 404);
    }

    $rol = DB::table('roles')->where('ID_Rol', $usuarioRol->ID_Rol)->first();

    if (!$rol) {
        return response()->json(['error' => 'Rol no encontrado'], 404);
    }

    $campos = json_decode($rol->Definicion)->campos ?? [];

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
