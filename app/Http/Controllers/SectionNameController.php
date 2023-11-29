<?php

namespace App\Http\Controllers;

use App\Models\PollingStation;
use Illuminate\Http\Request;

class SectionNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('is_admin');

        $pollingstations = PollingStation::select('id', 'locality')->get();

        return view('layouts.Section.create_section', compact('pollingstations'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->authorize('is_admin');

        $data = $request->validate([
            'name' => 'required|string',
            'polling_station_id' => 'required|exists:polling_stations,id'

        ]);

        PollingStation::query()
            ->findOrFail($data['polling_station_id'])
            ->sectionnames()
            ->create($data);

        return redirect()->back()->with('success', 'Section Created!');

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
