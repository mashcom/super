<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
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
        $validator = Validator::make($request->all(), [
            'document_id' => 'required',
            'accepted' => 'required',
            'comment' => 'max:255',
        ],[
            'accepted.required'=> 'The response type is required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Document::where("id", $request->document_id)
            ->update(["accepted" => $request->accepted, "comment" => $request->comment]);
        return response()->json(["success" => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $accept = $request->input("accept");
        Document::where("id", $id)->update(["accepted" => $accept]);
        return redirect()->back();
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
