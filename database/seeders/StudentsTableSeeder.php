<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Programme;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();


        for ($i = 0; $i < 100; $i++) {

            $selected_programme = Programme::inRandomOrder()->first();
            $last_name = $faker->lastName;
            $firstname = $faker->firstName;
            $regnum = $this->generateUniqueCode();
            $student = Student::create([
                'regnum' => $regnum,
                'sex' => $faker->randomElement(['Male', 'Female']),
                'surname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'programme' => $selected_programme->id,
                'academic_year' => rand(2, 5),
                'semester' => 2,
                'on_wrl' => 0
            ]);

            User::create([
                'name' => "$firstname $last_name",
                'email' => "$regnum@students.msuas.ac.zw",
                'password' => Hash::make('123456789'),
                'email_verified_at' => now(),
                'student_id' => $student->id
            ]);
        }
    }

    function generateUniqueCode()
    {
        $code = 'M';
        $randomNumber = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $code .= $randomNumber;

        // Check if the code already exists in the database
        $existingCode = Student::where('regnum', $code)->first();
        if ($existingCode) {
            // If the code exists, generate a new one
            return $this->generateUniqueCode();
        } else {
            // If the code doesn't exist, return it
            return $code;
        }
    }

}