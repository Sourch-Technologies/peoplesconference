<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollingStationRequest;
use App\Http\Requests\UpdatePollingStationRequest;
use App\Models\Constituency;
use App\Models\District;
use App\Models\PollingStation;
use Illuminate\Http\Request;

class PollingController extends Controller
{

    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $constituencies = Constituency::query()
            ->select('id', 'name')
            ->with([
                'pollingStations' => function ($q) {
                    $q->select('id', 'SNO', 'locality', 'building_location', 'polling_area', 'total_votes', 'constituency_id')
                        ->with([
                            'sectionnames' => function ($s) {
                                return $s->withCount('members');
                            }
                        ]);
                }
            ])
            ->orderBy('name', 'ASC')
            ->paginate(10);

        // dd($constituencies);

        return view('layouts.PollingStation.pollingStation', compact('constituencies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('is_admin');

        $constituencies = Constituency::all();

        return view('layouts.PollingStation.create-polling', compact('constituencies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollingStationRequest $request)
    {

        $this->authorize('is_admin');

        $data = $request->validated();

        Constituency::query()->findOrFail($data['constituency_id'])->pollingstations()->create($data);

        return redirect()->route('pollingstation.index')->with('success', 'Polling Station Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // $constituencies = Constituency::with('pollingStations')->findOrFail($id);

        $constituency = Constituency::query()
            ->select('id', 'name')
            ->with([
                'pollingStations' => function ($q) {
                    $q->select('id', 'SNO', 'locality', 'building_location', 'polling_area', 'total_votes', 'constituency_id')
                        ->with('sectionnames');
                }
            ])
            ->where('id', $id)
            ->first();


        return view('layouts.PollingStation.Constituency_pollingstation', compact('constituency'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $this->authorize('is_admin');

        $polling_station = PollingStation::query()->findOrFail($id);

        $constituencies = Constituency::all();

        return view('layouts.PollingStation.edit-polling', compact('polling_station', 'constituencies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->authorize('is_admin');

        $data = $request->validate([

            'SNO' => 'numeric|unique:polling_stations,SNO,' . $id,
            'locality' => 'required|string|unique:polling_stations,locality,' . $id,
            'building_location' => 'required|string',
            'polling_area' => 'required|string',
            'total_votes' => 'required|numeric',
            'constituency_id' => 'required|exists:constituencies,id'


        ]);

        // $pollingstation = PollingStation::query()->findOrFail($id);

        // $pollingstation->update($data);

        $pollingstation = Constituency::query()
            ->findOrFail($data['constituency_id'])
            ->pollingstations()
            ->update($data);

        return redirect()->route('pollingstation.index')->with('success', 'Polling Station Created');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $this->authorize('is_admin');

        $pollingstation = PollingStation::findOrfail($id);

        $pollingstation->delete();

        return redirect()->back()->with('success', 'Polling Station Deleted');

    }
}
