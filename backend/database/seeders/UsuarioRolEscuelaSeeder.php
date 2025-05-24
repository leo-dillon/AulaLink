<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioRolEscuelaSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuario_rol_escuela')->insert([
            [
                'Usuario_ID' => 1,      // Usuario con ID 1
                'Escuela_ID' => 1,      // Escuela con ID 1
                'Rol_ID' => 1,          // Rol con ID 1 (cambia si quieres otro)
                
                
            ],
            // Puedes agregar más registros si quieres
        ]);
    }
}
