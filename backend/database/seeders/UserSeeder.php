<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'firstName' => 'Ticiano',
                    'lastName' => 'Piccino Pujol' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12345678',
                    'email' => 'ticiano.piccino@davinci.edu.ar' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '2355550543' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],
                [
                    'firstName' => 'Alumno',
                    'lastName' => 'Alumno ' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12358965',
                    'email' => 'Alumno@prueva.com' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '235556895' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],
                [
                    'firstName' => 'Profesor',
                    'lastName' => 'Profesor ' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12356982',
                    'email' => 'Profesor@prueva.com' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '235556982' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],
                [
                    'firstName' => 'Padre',
                    'lastName' => 'Padre ' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12353462',
                    'email' => 'Padre@prueva.com' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '23559753' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],
                [
                    'firstName' => 'Preceptor',
                    'lastName' => 'Preceptor ' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12355691',
                    'email' => 'Preceptor@prueva.com' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '23556913' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],
                [
                    'firstName' => 'Director',
                    'lastName' => 'Director ' ,
                    'gender' => 'Masculino' ,
                    'birthdate' =>  '2005-06-21',
                    'dni' =>  '12317953',
                    'email' => 'Director@prueva.com' ,
                    'address' => 'Buenos Aires' ,
                    'phone' => '23551390' ,
                    'password' => bcrypt('1234567') ,
                    'asset' => true ,
                    'photo' => 'NULL',
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],

            ]
        );
    }
}
