<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                // Create 1000 users
                \App\Models\User::factory(1000)->create();

                // Create 1000 subscriptions, randomly linking to existing users
                \App\Models\Subscription::factory(1000)->create();
        
                // Create 1000 payments, randomly linking to existing subscriptions
                \App\Models\Payment::factory(1000)->create();

        // Seed the Frequency table
        $this->call(FrequencySeeder::class);
    }
}
