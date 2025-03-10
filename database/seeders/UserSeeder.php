<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\Chairperson;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $is_admin = 0;

            if ($i == 0)
                $is_admin = 1;
            User::create([
                'name' => $is_admin ? "Super Admin" : $faker->name,
                'email' => $is_admin ? "admin@email.com" : $faker->email,
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'is_admin' => $is_admin,
            ]);
        }

        $departments = Department::all();
        foreach ($departments as $key => $department) {
            $chairperson = new Chairperson();
            $chairperson->user_id = $key + 1;
            $chairperson->department_id = $department->id;
            $department->save();
        }
    }
}