<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class GetUserSchoolController extends Controller
{
    public function getUserSchool($userId){
        $escuelas = DB::table('schools')
            ->where('Usuario_ADM', $userId)
            ->select('ID_Escuela', 'Nombre')
            ->get();
        if($escuelas -> isEmpty()){
            return response()->json([
                'message'   => 'Usuario no tiene escuelas asignadas',
                'data'      => '' 
            ]);
        }
        return response()->json([
            'message'   => 'Usuario tiene escuelas asignadas',
            'data'      => $escuelas
        ]);
    }
}
