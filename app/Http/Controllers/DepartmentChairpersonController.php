<?php

namespace App\Http\Controllers;

use App\Mail\RoleAllocated;
use App\Models\Department;
use App\Models\DepartmentChairperson;
use App\Models\DepartmentCoordinator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Mail;

class DepartmentChairpersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'user_id' => 'required'
        ]);

        $user_id = $request->user_id;
        $department_id = $request->department_id;
        $exists = DepartmentChairperson::where('user_id', $user_id)->exists();
        if ($exists) {
            return back()->withErrors('User cannot be a chairperson of multiple departments');
        }


        if (DepartmentCoordinator::where('user_id', $user_id)->exists()) {
            return back()->withErrors('User is already a coordinator');
        }

        $chair = DepartmentChairperson::where('department_id', $department_id)->first();
        if (!$chair)
            $chair = new DepartmentChairperson();
        $chair->user_id = $user_id;
        $chair->department_id = $department_id;
        if ($chair->save()) {
            Artisan::call('app:align_supervisors');

            $user = User::findOrFail($user_id);
            $department = Department::findOrFail($department_id);
            Mail::to($user->email)->send(new RoleAllocated($user,$department,'Chairperson'));


            return back()->with('success', 'Chairperson saved successfully');
        }
        return back()->withErrors('Error saving');



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
