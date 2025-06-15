<?php
namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User_role_school;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{


    public function create(Request $request)
        {
            try {
                $request->validate([
                    'name'          => 'required|string|min:3|max:255',
                    'CUE'           => 'required|string|max:255|unique:schools,CUE',
                    'address'       => 'required|string|max:255',
                    'city'          => 'required|string|max:255',
                    'province'      => 'required|string|max:255',
                    'phones'        => 'nullable|array',
                    'phones.*'      => 'string|max:20|regex:/^[0-9+\-\s()]+$/',
                    'emails'        => 'nullable|array',
                    'emails.*'      => 'email|max:255',
                    'level'         => 'required|in:Inicial,Primario,Secundario,Primario y Secundario,Terciario',
                    'type'          => 'required|in:Privado,Publico,subvencionada',
                    'id_user'       => 'required|exists:users,id_user'
                ], [
                    'name.required' => 'El nombre es obligatorio',
                    'name.min'      => 'El nombre debe tener al menos 3 caracteres',
                    'name.max'      => 'El nombre no puede superar los 255 caracteres',
                    'name.string'   => 'El nombre debe ser un texto',

                    'CUE.required'  => 'El CUE es obligatorio',
                    'CUE.string'    => 'El CUE debe ser un texto',
                    'CUE.max'       => 'El CUE no puede superar los 255 caracteres',
                    'CUE.unique'    => 'Este CUE ya está registrado',

                    'address.required'  => 'La dirección es obligatoria',
                    'address.string'    => 'La dirección debe ser un texto',
                    'address.max'       => 'La dirección no puede superar los 255 caracteres',

                    'city.required' => 'La ciudad es obligatoria',
                    'city.string'   => 'La ciudad debe ser un texto',
                    'city.max'      => 'La ciudad no puede superar los 255 caracteres',

                    'province.required' => 'La provincia es obligatoria',
                    'province.string'   => 'La provincia debe ser un texto',
                    'province.max'      => 'La provincia no puede superar los 255 caracteres',

                    'phones.array'      => 'Los teléfonos deben enviarse en forma de lista',
                    'phones.*.string'   => 'Cada teléfono debe ser un texto',
                    'phones.*.max'      => 'Cada teléfono no puede superar los 20 caracteres',
                    'phones.*.regex'    => 'Cada teléfono solo puede contener números, espacios, paréntesis, guiones o signos +',

                    'emails.array'      => 'Los correos deben enviarse en forma de lista',
                    'emails.*.email'    => 'Cada correo debe tener un formato válido',
                    'emails.*.max'      => 'Cada correo no puede superar los 255 caracteres',

                    'level.required'    => 'El nivel es obligatorio',
                    'level.in'          => 'El nivel seleccionado no es válido',

                    'type.required'     => 'El tipo de institución es obligatorio',
                    'type.in'           => 'El tipo seleccionado no es válido',

                    'id_user.required'  => 'El ID de usuario es obligatorio',
                    'id_user.exists'    => 'El usuario no existe en la base de datos'
                ]);
                DB::transaction( function () use ($request){ 
                    // Creando escuela
                    $school = new School();
                    $school -> name            = $request -> name;
                    $school -> CUE             = $request -> CUE;
                    $school -> address         = $request -> address;
                    $school -> city            = $request -> city;
                    $school -> province        = $request -> province;
                    $school -> phones          = json_encode($request -> phones);
                    $school -> emails          = json_encode($request -> emails);
                    $school -> level           = $request -> level;
                    $school -> type            = $request -> type;
                    $school -> id_user         = $request -> id_user;
                    $school -> save();
    
                    // Agregando el rol director de la escuela
                    $userRolSchool = new User_role_school();
                    $userRolSchool -> id_user   = $school -> id_user;
                    $userRolSchool -> id_school = $school -> id_school;
                    $userRolSchool -> id_role   = 5; // id rol director   
                    $userRolSchool -> save();
                });
                

                return response() -> json([
                    'message' => 'La escuela fue creada satisfactoriamente',
                ]);
        } catch ( \Illuminate\Validation\ValidationException $e) {
            return response() -> json([
                'message'           => 'Los datos enviados tienen errores',
                'data'              => $e -> errors(),
            ], 422);
        } catch( \Exception $e){
            return response() -> json([
                'message'   => 'Ocurrio un error inesperado, Vuelve a intentarlo más tarde',
                'data'      => $e -> getMessage()
            ], 500);
        }
        // return response() -> json($request);
    }
    
    public function edit(Request $request, int $id){
        try {
            $school = School::findOrFail($id);

            $request->validate([
                'name'          => 'required|string|min:3|max:255',
                'address'       => 'required|string|max:255',
                'city'          => 'required|string|max:255',
                'province'      => 'required|string|max:255',
                'phones'        => 'nullable|array',
                'phones.*'      => 'string|max:20|regex:/^[0-9+\-\s()]+$/',
                'emails'        => 'nullable|array',
                'emails.*'      => 'email|max:255',
                'level'         => 'required|in:Inicial,Primario,Secundario,Primario y Secundario,Terciario',
                'type'          => 'required|in:Privado,Publico,subvencionada',
            ], [
                'name.required' => 'El nombre es obligatorio',
                'name.min'      => 'El nombre debe tener al menos 3 caracteres',
                'name.max'      => 'El nombre no puede superar los 255 caracteres',
                'name.string'   => 'El nombre debe ser un texto',

                'address.required'  => 'La dirección es obligatoria',
                'address.string'    => 'La dirección debe ser un texto',
                'address.max'       => 'La dirección no puede superar los 255 caracteres',

                'city.required' => 'La ciudad es obligatoria',
                'city.string'   => 'La ciudad debe ser un texto',
                'city.max'      => 'La ciudad no puede superar los 255 caracteres',

                'province.required' => 'La provincia es obligatoria',
                'province.string'   => 'La provincia debe ser un texto',
                'province.max'      => 'La provincia no puede superar los 255 caracteres',

                'phones.array'      => 'Los teléfonos deben enviarse en forma de lista',
                'phones.*.string'   => 'Cada teléfono debe ser un texto',
                'phones.*.max'      => 'Cada teléfono no puede superar los 20 caracteres',
                'phones.*.regex'    => 'Cada teléfono solo puede contener números, espacios, paréntesis, guiones o signos +',

                'emails.array'      => 'Los correos deben enviarse en forma de lista',
                'emails.*.email'    => 'Cada correo debe tener un formato válido',
                'emails.*.max'      => 'Cada correo no puede superar los 255 caracteres',

                'level.required'    => 'El nivel es obligatorio',
                'level.in'          => 'El nivel seleccionado no es válido',

                'type.required'     => 'El tipo de institución es obligatorio',
                'type.in'           => 'El tipo seleccionado no es válido',
            ]);

            $school -> name            = $request -> name;
            $school -> address         = $request -> address;
            $school -> city            = $request -> city;
            $school -> province        = $request -> province;
            $school -> phones          = json_encode($request -> phones);
            $school -> emails          = json_encode($request -> emails);
            $school -> level           = $request -> level;
            $school -> type            = $request -> type;
            $school -> save();

            return response() -> json([
                'message'   => "La escuela fue editada correctamente"
            ]);

        } catch( \Illuminate\Database\Eloquent\ModelNotFoundException $e ){
            return response() -> json([
                'message'   => 'La escuela que quieres editar no fue encontrado',
            ], 404);
        } catch ( \Illuminate\Validation\ValidationException $e) {
            return response() -> json([
                'message'   => 'Los datos enviados tienen errores',
                'error'     => $e -> getMessage()
            ], 422);
        } catch( \Exception $e){
            return response() -> json([
                'message' => 'Ocurrio un error inesperado, Vuelve a intentarlo más tarde'
            ], 500);
        }
    }

    public function getAll(){
        return School::all();
    }

    public function getById(int $idSchool){
        try {
            $school = School::findOrFail($idSchool);
            return response() -> json([
                "message"   => "La escuela fue encontrada",
                "data"      => $school
            ]);

        } catch( \Illuminate\Database\Eloquent\ModelNotFoundException $e ){
            return response() -> json([
                'message'   => 'Escuela no encontrada',
            ], 404);
        
        } catch (\Throwable $e) {
            return response() -> json([
                'message' => 'Ocurrio un error inesperado. Intente denuevo más adelante'
            ]);
        }
    }

    public function getByName(string $name){
        try {
            $school = School::where('name', "like", "%". $name ."%") -> get();

            if($school -> isEmpty()){
                return response() -> json([
                    'message' => 'No se encontraron escuelas'
                ], 404);
            }
            return response() -> json([
                "message"   => "La escuela fue encontrada",
                "data"      => $school
            ]);

        } catch( \Illuminate\Database\Eloquent\ModelNotFoundException $e ){
            return response() -> json([
                'message'   => 'Escuela no encontrada'
            ], 404);
        
        } catch (\Throwable $e) {
            return response() -> json([
                'message' => 'Ocurrio un error inesperado. Intente denuevo más adelante'
            ], 500);
        }
    }

    public function delete(int $idSchool){
        try {
            $school = School::findOrFail($idSchool);
            $school -> delete();

            return response() -> json([
                'message' => "La escuela fue eliminada correctamente"
            ]);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'La escuela que quieres eliminar no existe'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al intentar eliminar la escuela',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
