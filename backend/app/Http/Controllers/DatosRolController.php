<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosRol;
use App\Models\UsuarioRolEscuela;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DatosRolController extends Controller
{
    // Obtener los campos definidos para el rol asociado a un usuario
  public function obtenerCampos($idUsuario)
{
    // Buscar el último registro por Usuario_ID
    $usuarioRol = DB::table('usuario_rol_escuela')
        ->where('Usuario_ID', $idUsuario)
        ->orderByDesc('ID_UserRolEscuela') // o por created_at si tenés timestamps válidos
        ->first();

    if (!$usuarioRol) {
        return response()->json(['error' => 'No se encontró un rol para este usuario'], 404);
    }

    $rol = DB::table('roles')->where('ID_Rol', $usuarioRol->Rol_ID)->first();

    if (!$rol) {
        return response()->json(['error' => 'Rol no encontrado'], 404);
    }

    $campos = json_decode($rol->Definicion, true);
    
    return response()->json([
        'rol' => $rol->Nombre,
        'campos' => $campos['campos'] ?? []
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
    $datosRol->ID_UserRolEscuela = $request->ID_UserRolEscuela; // corregido aquí
    $datosRol->Datos = json_encode($request->Datos);
    $datosRol->save();

    return response()->json(['message' => 'Datos guardados correctamente']);
}

}
