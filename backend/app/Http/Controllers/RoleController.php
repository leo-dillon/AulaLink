<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all(); // Devolver todos los roles
    }

    public function create(Request $request){
        try {
            $request -> validate([
                'name' => 'required|min:3|unique:role,name'
            ], [
                'name.required' => 'Este campo es requerido',
                'name.min'      => 'El nombre debe tener como minimo 3 caracteres'     ,
                'name.unique'   => 'El rol que intentas crear ya existe'
            ]);

            $role = new Role();
            $role -> name = $request -> name;
            $role -> save();

            return response() -> json([
                'message' => 'El Rol fue creado correctamente'
            ], 201);

        } catch ( \Illuminate\Validation\ValidationException $e) {
            return response() -> json([
                'message'   => 'Los datos enviados tienen errores',
                'error'     => $e->errors()
            ], 422);
        }

        // return response() -> json([ 'message' => 'Pruebas' ]);
    }

    public function getRoleByName(string $rolName){
        try {
            $rolData = Role::where('name', $rolName)->first();
            if(!$rolData){
                return response() -> json([
                    'message' => 'El Rol buscado no existe'
                ], 404);
            }
            return response() -> json([
                'message'   => 'Rol encontrado',
                'rol'       => $rolData
            ], 200);
        } catch (\Exception $e) {
            return response() -> json([
                'message' => 'Ocurrio un error inesperado. Intente denuevo más adelante'
            ]);
        }
    }

    public function getRoleById(int $idRole){
        try {
            $rolData = Role::findOrFail($idRole);
            if(!$rolData){
                return response() -> json([
                    'message' => 'El Rol buscado no existe'
                ], 404);
            }
            return response() -> json([
                'message'   => 'Rol encontrado',
                'rol'       => $rolData
            ], 200);
        } catch (\Exception $e) {
            return response() -> json([
                'message' => 'Ocurrio un error inesperado. Intente denuevo más adelante'
            ]);
        }
    }
}
