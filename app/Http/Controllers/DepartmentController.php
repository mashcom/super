<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentChairperson;
use App\Models\DepartmentCoordinator;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('chairperson.user')->orderBy('name', 'asc')->get();

        return view('department.index', compact('departments'));

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

        $department = Department::with('chairperson.user', 'coordinator.user')
            ->findOrFail($id);
        $users = User::whereNull('student_id')->get();

        foreach ($users as $user) {
            $user->is_chairperson = DepartmentChairperson::where('user_id', $user->id)->exists();
            $user->is_coordinator = DepartmentCoordinator::where('user_id', $user->id)->exists();
        }
        return view('department.edit', compact('department', 'users'));
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
