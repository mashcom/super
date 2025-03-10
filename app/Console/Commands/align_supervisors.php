<?php

namespace App\Console\Commands;

use App\Models\PlacementSupervisor;
use DB;
use Illuminate\Console\Command;

class align_supervisors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:align_supervisors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Align students and with chairpersons and coordinators';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = "SELECT
                placements.id as placement_id,
                c.user_id AS chairperson_id,
                co.user_id AS coordinator_id 
                FROM
                students
                INNER JOIN programmes ON programmes.id = students.programme
                INNER join placements on placements.student_id = students.id
                LEFT JOIN department_chairpersons c ON c.department_id = programmes.department_id
                LEFT JOIN department_coordinators co ON co.department_id = programmes.department_id";

        $students = collect(DB::select($query));
        foreach ($students as $student) {
            $placement = PlacementSupervisor::where('placement_id', $student->placement_id)->first();
            if (!$placement)
                continue;

            $placement->chairperson_id = $student->chairperson_id;
            $placement->coordinator_id = $student->coordinator_id;
            $placement->save();
            //print_r($placement);
        }
    }
}
