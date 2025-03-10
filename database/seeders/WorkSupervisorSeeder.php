<?php

// database/seeders/SupervisorSeeder.php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\WorkSupervisor;

class WorkSupervisorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            WorkSupervisor::create([
                'name' => $faker->name,
                'designation' => $faker->jobTitle,
                'telephone' => $faker->phoneNumber,
                'email' => $faker->email,
                'placement_id' => rand(1, 400), // assuming you have 400 placements
            ]);
        }
    }
}