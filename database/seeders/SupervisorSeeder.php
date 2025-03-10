<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlacementSupervisor;
use Faker\Factory as Faker;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i < 400; $i++) {
            PlacementSupervisor::create([
                'placement_id'=>$i,
                'user_id' => rand(1, 30), // between 1 and 30
            ]);
        }
    }
}
