<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Frequency::create(['frequency' => 'weekly']);
        \App\Models\Frequency::create(['frequency' => 'monthly']);
        \App\Models\Frequency::create(['frequency' => 'yearly']);
    }
}
