<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    protected $model = \App\Models\Subscription::class;

    public function definition()
    {
        return [
            'produk' => $this->faker->word,
            'harga' => $this->faker->randomFloat(2, 10, 500), // Random price between 10 and 500
            'due_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'frequency_id' => $this->faker->numberBetween(1, 3), // Assuming 1=weekly, 2=monthly, 3=yearly
            'payment_method' => $this->faker->randomElement(['Card', 'Transfer', 'PayPal']),
            'user_id' => \App\Models\User::factory(),
            'note' => $this->faker->sentence,
        ];
    }
}