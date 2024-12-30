<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class SubscriptionFactory extends Factory
{
    protected $model = \App\Models\Subscription::class;

    public function definition()
    {
        return [
            'produk' => $this->faker->word,
            'harga' => $this->faker->randomFloat(2, 10, 500),
            'due_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'frequency_id' => $this->faker->numberBetween(1, 3),
            'user_id' => User::inRandomOrder()->first()->user_id ?? User::factory(), // Use an existing user
        ];
    }
}
