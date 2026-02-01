<?php

namespace App\Http\Controllers;

use App\Models\CrudExample;
use Illuminate\Http\Request;

class CrudExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CrudExample::all();
        return view('crud-examples.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud-examples.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required|integer',
            'salary' => 'required|numeric',
        ]);

        CrudExample::create($request->all());

        return redirect()->route('crud-examples.index')->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrudExample $crudExample)
    {
        return view('crud-examples.show', compact('crudExample'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrudExample $crudExample)
    {
        return view('crud-examples.edit', compact('crudExample'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrudExample $crudExample)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required|integer',
            'salary' => 'required|numeric',
        ]);

        $crudExample->update($request->all());

        return redirect()->route('crud-examples.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrudExample $crudExample)
    {
        $crudExample->delete();

        return redirect()->route('crud-examples.index')->with('success', 'Data deleted successfully.');
    }
}
