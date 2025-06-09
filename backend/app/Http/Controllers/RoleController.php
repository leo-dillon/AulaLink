<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class RoleController extends Controller
{
    // Devolver todos los roles
    public function index()
    {
        return Role::all();
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

    public function edit( int $idRole, Request $request){
        try {
            
            $rolData = Role::findOrFail($idRole);
            
            $request -> validate([
                'name' => 'required|min:3|unique:role,name'
            ], [
                'name.required' => 'Este campo es requerido',
                'name.min'      => 'El nombre debe tener como minimo 3 caracteres'     ,
                'name.unique'   => 'El rol que intentas crear ya existe'
            ]);

            $rolData -> name = $request -> name;
            $rolData -> save();

            return response() -> json([
                'message'   => 'El Rol fue editado correctamente',
                'data'      => $rolData
            ], 201);

        } catch( \Illuminate\Database\Eloquent\ModelNotFoundException $e ){
            return response() -> json([
                'message'   => 'El rol que quieres editar no fue encontrado',
            ], 404);
        } catch ( \Illuminate\Validation\ValidationException $e) {
            return response() -> json([
                'message'   => 'Los datos enviados tienen errores',
            ], 422);
        } catch( \Exception $e){
            return response() -> json([
                'message' => 'Ocurrio un error inesperado, Vuelve a intentarlo más tarde'
            ], 500);
        }
    }

    public function delete(int $idRole)
    {
        try {
            $role = Role::findOrFail($idRole);
            $role->delete();
            return response()->json([
                'message' => 'El rol fue eliminado correctamente'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'El rol que quieres eliminar no existe'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al intentar eliminar el rol',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
