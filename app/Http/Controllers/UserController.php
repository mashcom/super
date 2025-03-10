<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::orderBy("name", "asc")
            ->with('chairperson.department', 'coordinator.department')
            ->where('student_id', NULL)
            ->get();

        $students = User::orderBy("name", "asc")
            ->whereNotNull('student_id')
            ->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20',
            'password_confirmation' => 'required|string|min:6|max:20|same:password',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.exists' => 'The email must be registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters long.',
            'password_confirmation.same' => 'The password confirmation does not match.',
        ]);
        $request->password = Hash::make($request->password);
        $request->password_confirmation = $request->password;
        DB::transaction(function () use ($request) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_admin = $request->is_admin;
            $user->save();
        });

        return redirect()->route('user.index');
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
