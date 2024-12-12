<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = \App\Models\Payment::class;

    public function definition()
    {
        return [
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'amount' => $this->faker->randomFloat(2, 10, 500), // Random amount
            'subscription_id' => \App\Models\Subscription::factory(),
            'payment_method' => $this->faker->randomElement(['Card', 'Transfer', 'PayPal']),
            'proof' => $this->faker->imageUrl(),
        ];
    }
}