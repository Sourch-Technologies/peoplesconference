<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollingStationRequest;
use App\Models\Constituency;
use App\Models\District;
use Illuminate\Http\Request;

class PollingController extends Controller
{

    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $districts = District::with('pollingStations')->get();

        // dd($districts);

        return view('layouts.PollingStation.pollingstation', compact('districts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $constituencies = Constituency::all();

        return view('layouts.PollingStation.create-polling', compact('constituencies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollingStationRequest $request)
    {

        $data = $request->validated();

        Constituency::query()->findOrFail($data['constituency_id'])->pollingstations()->create($data);

        return redirect()->route('pollingstation.index')->with('success', 'Polling Station Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



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
