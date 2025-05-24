<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatosRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('datos_roles')->insert([
            [
                'ID_UserRolEscuela' => 1, // Asegurate de que este ID exista en usuario_rol_escuela
                'Datos' => json_encode([
                    'legajo' => 'A1234',
                    'Turno' => 'Mañana',
                    'CursoActual_ID' => 3,
                    'Estado' => 'activo'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
        ]);
    }
}
