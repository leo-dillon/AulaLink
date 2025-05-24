<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institucion;
use PhpParser\Node\Stmt\TryCatch;

class InstitucionController extends Controller
{
     public function lookFor (Request $request){
      $nombre = $request->query('nombre');
    
    return Institucion::where('nombre', 'like', "%$nombre%")
                      ->select('ID_Escuela', 'nombre')
                      ->limit(5)
                      ->get();

     }
    public function store(Request $request)
    {
         $request->validate([
            'Nombre' => 'required|string|max:255',
            'CUE' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Localidad' => 'required|string|max:255',
            'Provincia' => 'required|string|max:255',
            'Telefonos' => 'nullable|string|max:255',
            'Emails' => 'nullable|email|max:255',
            'Nivel' => 'required|in:Inicial,Primario,Secundario,Terciario',
            'Tipo' => 'required|in:Privado,Publico,subvencionada',

        ]);

        $Institucion = new Institucion();
        $Institucion -> Nombre      = $request -> Nombre;
        $Institucion -> CUE       = $request -> CUE;
        $Institucion -> Direccion         = $request -> Direccion;
        $Institucion -> Localidad      = $request -> Localidad;
        $Institucion -> Provincia            = $request -> Provincia;
        $Institucion -> Telefonos          = $request -> Telefonos;
        $Institucion -> Emails        = $request -> Emails;
        $Institucion -> Nivel          = $request -> Nivel;
        $Institucion -> Tipo          = $request -> Tipo;
        $Institucion -> save();

        // return response() -> json([
        //     'message' => 'El usuario fue registrado',
        //     'request' => $Institucion
        // ]);

        
        return response()->json(['message' => 'Institución creada', 'institucion' => $Institucion], 201);
    }
}
