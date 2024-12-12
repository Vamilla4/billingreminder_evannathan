<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'login' => $this->faker->unique()->userName . rand(1, 1000) . '@example.com',// the email takes the name and then uses random number
            'password' => bcrypt('password'), // yeah the password is password
        ];
    }
}