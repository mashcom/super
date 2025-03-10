<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use App\Models\PlacementSupervisor;
use App\Models\Student;
use Illuminate\Http\Request;

class PlacementSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'placement_id' => 'required|integer',
            'type' => 'required',
        ]);

        $placement = PlacementSupervisor::where('placement_id', $request->placement_id)->first();
        if (empty($placement)) {
            $placement = new PlacementSupervisor();
        }
        //dd($request->type);

        switch ($request->type) {
            case 'supervisor':
                $placement->user_id = $request->user_id;
                break;

            case 'coordinator':
                $placement->coordinator_id = $request->user_id;
                break;

            case 'chairperson':
                $placement->chairperson_id = $request->user_id;
                break;
        }

      //  dd($placement);
        $placement->placement_id = $request->placement_id;
        $placement->save();


        $placement = Placement::find($request->placement_id);
        $student = Student::find($placement->student_id);

        // Return a success response
        return redirect(url("student/$student->regnum"))->with('success', 'Placement Supervisor created/updated successfully!');


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
