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
                    'campos' => [
                        ['nombre' => 'CursoActual_ID', 'tipo' => 'número'],
                        ['nombre' => 'legajo', 'tipo' => 'texto'],
                        ['nombre' => 'Turno', 'tipo' => 'texto'],
                        ['nombre' => 'Estado', 'tipo' => 'texto'],
                    ]
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 2,
                'Nombre' => 'Profesor',
                'Definicion' => json_encode([
                    'campos' => [
                        ['nombre' => 'matricula_profesional', 'tipo' => 'texto'],
                        ['nombre' => 'especialidad', 'tipo' => 'texto'],
                        ['nombre' => 'Turno', 'tipo' => 'texto'],
                        ['nombre' => 'legajo', 'tipo' => 'texto'],
                    ]
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 3,
                'Nombre' => 'Padre',
                'Definicion' => json_encode([
                    'campos' => [
                        ['nombre' => 'relacion_con_alumno', 'tipo' => 'texto'],
                        ['nombre' => 'asociados_alumno_IDs', 'tipo' => 'texto'],
                        ['nombre' => 'autorizado_a_retirar', 'tipo' => 'checkbox'],
                    ]
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 4,
                'Nombre' => 'Preceptor',
                'Definicion' => json_encode([
                    'campos' => [
                        ['nombre' => 'Curso_asignado', 'tipo' => 'texto'],
                        ['nombre' => 'Turno', 'tipo' => 'texto'],
                    ]
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Rol' => 5,
                'Nombre' => 'Director',
                'Definicion' => json_encode([
                    'campos' => [
                        ['nombre' => 'Nivel_educativo', 'tipo' => 'texto'],
                        ['nombre' => 'fecha_designacion', 'tipo' => 'date'],
                        ['nombre' => 'permanencia', 'tipo' => 'número'],
                    ]
                ]),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
]);

    }
}
