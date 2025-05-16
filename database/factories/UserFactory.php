<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'birthdate' => $this->faker->date(),
            'dni' => $this->faker->unique()->numerify('########'),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'password' => bcrypt('password123'),
            'asset' => true,
            'photo' => null,
            'userRole_id' => null,
            'creationDate' => now(),
            'lastConnection' => now(),
        ];
    }
}
