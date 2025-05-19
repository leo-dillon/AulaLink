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
                    'name' => 'Ticiano',
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
                    'userRole_id' => 1,
                    'creationDate' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'lastConnection' => now(),
                ],

            ]
        );
    }
}
