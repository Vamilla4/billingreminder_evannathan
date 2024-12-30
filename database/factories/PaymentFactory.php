<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subscription;

class PaymentFactory extends Factory
{
    protected $model = \App\Models\Payment::class;

    public function definition()
    {
        return [
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'subscription_id' => Subscription::inRandomOrder()->first()->subscription_id ?? Subscription::factory(), // Use an existing subscription
            'payment_method' => $this->faker->randomElement(['Card', 'Transfer', 'PayPal']),
            'proof' => $this->faker->imageUrl(),
        ];
    }
}
