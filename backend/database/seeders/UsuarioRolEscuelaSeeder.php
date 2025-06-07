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
                'id_role' => 1,          // Rol con ID 1 (cambia si quieres otro)
            ],
             [
                'Usuario_ID' => 2,      // Usuario con ID 2
                'Escuela_ID' => 1,      // Escuela con ID 1
                'id_role' => 2,          // Rol con ID 2 (cambia si quieres otro)
            ],
             [
                'Usuario_ID' => 3,      // Usuario con ID 3
                'Escuela_ID' => 1,      // Escuela con ID 1
                'id_role' => 3,          // Rol con ID 3 (cambia si quieres otro)
            ],
             [
                'Usuario_ID' => 4,      // Usuario con ID 4
                'Escuela_ID' => 1,      // Escuela con ID 1
                'id_role' => 4,          // Rol con ID 4 (cambia si quieres otro)
            ],
             [
                'Usuario_ID' => 5,      // Usuario con ID 5
                'Escuela_ID' => 1,      // Escuela con ID 1
                'id_role' => 5,          // Rol con ID 5 (cambia si quieres otro)
            ],
            
        ]);
    }
}
