<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Placement;
use Illuminate\Support\Facades\Validator;

class PlacementController extends Controller
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

        $on_wrl = $request->on_wrl ? 1 : 0;
        if ($request->on_wrl) {
            $defaults = [
                'name' => $request->name ?? 'MSUAS',
                'city' => $request->city ?? 'Mutare',
                'country' => $request->country ?? 'Zimbabwe',
                'physical_address' => $request->physical_address ?? 'Fern Hill Campus',
                'telephone' => $request->telephone ?? '+2632063456',
                'email' => $request->email ?? 'wrl@msuas.ac.zw',
                'date_of_engagement' => $request->date_of_engagement ?? date('Y-m-d'),
                'on_wrl' => $on_wrl
            ];

            // Merge the defaults into the request data.
            $request->merge($defaults);
        }

        $validator = Validator::make($request->all(), [
            'regnum' => 'required|string',
            'name' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'physical_address' => 'required|string',
            'telephone' => 'required|regex:/^\+?\d{1,3}[-\s.]?\(?\d{1,3}\)?[-\s.]?\d{1,4}[-\s.]?\d{1,4}$/',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'date_of_engagement' => 'required|date|before_or_equal:today',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::where("regnum", $request->regnum)->first();
        Placement::updateOrInsert(
            ['student_id' => $student->id],
            [
                'name' => $request->input('name'),
                'city' => $request->input('city'),
                'physical_address' => $request->input('physical_address'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'country' => $request->input('country'),
                'website' => $request->input('website'),
                'date_of_engagement' => date('Y-m-d', strtotime($request->input('date_of_engagement'))),
                'on_wrl'=>$on_wrl
                ]
        );

        return redirect(url("student/$request->regnum"))->with('success', 'Placement created/updated successfully!');

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
