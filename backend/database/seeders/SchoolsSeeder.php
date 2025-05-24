<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert(
            [
                [
                    'Nombre'=> 'Notre',
                    'CUE'=> '232542',
                    'Direccion'=>'Belgrano 53',
                    'Localidad'=>'Lincoln',
                    'Provincia'=>'Buenos Aires',
                    'Telefonos'=>'2355550543',
                    'Emails'=>'Notre@Notre.com',
                    'Nivel' =>'Secundario',
                    'Tipo'=>'subvencionada',
                    'Usuario_ADM'=>'1',
                    'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                    'Nombre'=> 'Monse',
                    'CUE'=> '26594',
                    'Direccion'=>'25 de Mayo 53',
                    'Localidad'=>'Lincoln',
                    'Provincia'=>'Buenos Aires',
                    'Telefonos'=>'2355550544',
                    'Emails'=>'Monse@Notre.com',
                    'Nivel' =>'Secundario',
                    'Tipo'=>'subvencionada',
                    'Usuario_ADM'=>'1',
                    'created_at' => now(),
                'updated_at' => now(),
                ],

            ]
        );
    }
}
