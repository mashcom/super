<?php

namespace App\Http\Controllers;

use App\Models\WorkSupervisor;
use Illuminate\Http\Request;

class WorkSupervisorController extends Controller
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'placement_id' => 'required|integer',
            'telephone' => 'required|string',
            'email' => 'required|email',
        ]);

        WorkSupervisor::updateOrInsert(
            ['placement_id' => $validatedData['placement_id']],
            $validatedData
        );

        // Return a success response
        return redirect(url("student/$request->regnum"))->with('success', 'Work Supervisor created/updated successfully!');

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
