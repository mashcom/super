<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Placement;
use App\Models\Programme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $programmes = [
            [
                'programme' => "Bachelor of Accounting Honours Degree",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Accounting"
            ],
            [
                'programme' => "Bachelor of Commerce in Business Management Honours Degree",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Business Management"
            ],
            [
                'programme' => "Bachelor of Commerce in Tourism and Hospitality Management Honours Degree",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Tourism & Hospitality"
            ],
            [
                'programme' => "Bachelor of Science in Applied Statistics Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Applied Statistics"
            ],
            [
                'programme' => "Bachelor of Science in Information Systems Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Information Systems"
            ],
            [
                'programme' => "Bachelor of Engineering in Chemical and Processing Honours Degree",
                'faculty' => "FACULTY OF ENGINEERING",
                'department' => "Department of Chemical & Processing Engineering"
            ],
            [
                'programme' => "Bachelor of Engineering in Metallurgical Engineering Honours Degree",
                'faculty' => "FACULTY OF ENGINEERING",
                'department' => "Department of Metallurgical Engineering"
            ],
            [
                'programme' => "Bachelor of Engineering in Mining and Mineral Processing Honours Degree",
                'faculty' => "FACULTY OF ENGINEERING",
                'department' => "Department of Mining & Mineral Processing"
            ],
            [
                'programme' => "Bachelor of Science in Human Resource Management Honours Degree",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Human Resource Management"
            ],
            [
                'programme' => "Bachelor of Science in Psychology Honours Degree",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Psychology"
            ],
            [
                'programme' => "Bachelor of Science in Computer Science Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Computer Science"
            ],
            [
                'programme' => "Bachelor of Science in Agricultural Economics and Development Honours Degree",
                'faculty' => "FACULTY OF AGRIBUSINESS MANAGEMENT",
                'department' => "Department of Agricultural Economics & Development"
            ],
            [
                'programme' => "Bachelor of Science in Computer Systems Engineering Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Computer Systems Engineering"
            ],
            [
                'programme' => "Bachelor of Science in Business Intelligence and Data Analytics Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Business Intelligence & Data Analytics"
            ],
            [
                'programme' => "Bachelor of Science in Cyber Security and Forensic Computing Honours Degree",
                'faculty' => "FACULTY OF APPLIED SCIENCES & TECHNOLOGY",
                'department' => "Department of Cyber Security & Forensic Computing"
            ],
            [
                'programme' => "Bachelor of Science Honours Degree in Organisational And Industrial Psychology",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Organisational & Industrial Psychology"
            ],
            [
                'programme' => "English Proficiency",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Languages"
            ],
            [
                'programme' => "Masters of Science in Tourism and Hospitality Management",
                'faculty' => "FACULTY OF APPLIED SOCIAL SCIENCES",
                'department' => "Department of Tourism & Hospitality Management"
            ],
        ];


        foreach ($programmes as $programme) {

            $department = $programme['department'];
            $faculty = $programme['faculty'];

            $x = Department::where('name', $department)->where('faculty', $faculty)->first();
            if ($x)
                continue;

            $x = new Department();
            $x->name = $department;
            $x->faculty = $faculty;
            $x->save();

        }


        foreach ($programmes as $programme) {
            $department = $programme['department'];
            $faculty = $programme['faculty'];
            $p = $programme['programme'];

            $d = Department::where('name', $department)->first();

            $programme = new Programme();
            $programme->name = $p;
            $programme->department_id = $d->id;
            $programme->save();

        }

    }
}