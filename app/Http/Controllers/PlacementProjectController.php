<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use App\Models\PlacementProject;
use Illuminate\Http\Request;

class PlacementProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $request->validate([
            'placement_id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);

        $project = PlacementProject::where('placement_id', $request->placement_id)
            ->first();

        $project = $project ? $project : new PlacementProject();
        $project->placement_id = $request->placement_id;
        $project->title = $request->name;
        $project->type = $request->type;
        if ($project->save()) {

            $placement = Placement::with('student')->find($request->placement_id);
            return redirect(route('student.show', $placement?->student?->regnum))
                ->with('success', 'Project saved successfully');
        }
        return back()->withErrors('Error saving project');
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
        $project = PlacementProject::where('placement_id', $id)->first();
        $placement = Placement::findOrFail($id);
        return view('student.edit_project', compact('project', 'placement'));
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
