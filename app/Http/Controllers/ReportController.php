<?php

namespace App\Http\Controllers;

use App\Models\Student;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = DB::select("SELECT 
                                                departments.name,
                                                COUNT(students.id) AS students
                                            FROM students
                                            INNER JOIN programmes ON programmes.id = students.programme
                                            INNER JOIN departments ON departments.id = programmes.department_id
                                            
                                            GROUP BY departments.id
                                            ORDER BY departments.name ASC
                                        ");

        $departments = collect($departments);
        // dd($departments);

        $query = "SELECT 
                    departments.faculty as name,
                    COUNT(students.id) AS students
                    FROM students
                    INNER JOIN programmes ON programmes.id = students.programme
                    INNER JOIN departments ON departments.id = programmes.department_id
                    GROUP BY departments.faculty
                    ORDER BY departments.faculty asc";

        $faculties = collect(DB::select($query));


        $students = Student::count();

        $query = "SELECT COUNT(placement_supervisors.user_id) number_of_student FROM placement_supervisors
                    INNER JOIN placements ON placements.id = placement_supervisors.placement_id
                    ";
        $placed = collect(DB::select($query))->first();
        return view('report.index', compact('departments', 'faculties', 'students', 'placed'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
