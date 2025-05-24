<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'ID_Rol' => 1,
                'Nombre' => 'Alumno',
                'Definicion' => json_encode([
                    'campos' => ['CursoActual_ID', 'legajo', 'Turno', 'Estado']
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 2,
                'Nombre' => 'Profesor',
                'Definicion' => json_encode([
                    'campos' => ['matricula_profesional', 'especialidad', 'Turno', 'legajo']
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 3,
                'Nombre' => 'Padre',
                'Definicion' => json_encode([
                    'campos' => ['relacion_con_alumno', 'asociados_alumno_IDs', 'autorizado_a_retirar']
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(), 
            ],
            [
                'ID_Rol' => 4,
                'Nombre' => 'Preceptor',
                'Definicion' => json_encode([
                    'campos' => ['Curso_asignado', 'Turno']
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 5,
                'Nombre' => 'Director',
                'Definicion' => json_encode([
                    'campos' => ['Nivel_educativo', 'fecha_designacion', 'permanencia']
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
