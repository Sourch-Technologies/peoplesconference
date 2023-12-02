<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollingStationRequest;
use App\Http\Requests\UpdatePollingStationRequest;
use App\Models\Constituency;
use App\Models\District;
use App\Models\PollingStation;
use App\Models\SectionName;
use Illuminate\Http\Request;

class PollingController extends Controller
{

    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $query = $request->input('query');

        $pollingStations = PollingStation::with(['sectionnames' => function ($s) {
            $s->withCount('members');
        }])
            ->where(function ($q) use ($query) {

                if ($query) {
                    $q->where('SNO', 'LIKE', '%' . $query . '%')
                        ->orWhere('locality', 'LIKE', '%' . $query . '%')
                        ->orWhere('building_location', 'LIKE', '%' . $query . '%');
                }
            })
            ->orderBy('SNO', 'asc')
            ->paginate(10)
            ->appends(['query' => $query]);

        return view('layouts.PollingStation.pollingStation', compact('pollingStations'));
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

        $constituency = Constituency::query()
            ->select('id', 'name')
            ->with(['pollingstations.sectionnames' => function ($query) {
                $query->withCount('members');
            }])
            ->where('id', $id)
//            ->orderBy('SNO')
            ->first();

//        dd($constituency);

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


        // Validate the form data
        $validatedData = $request->validate([
            'SNO' => 'required|numeric|unique:polling_stations,SNO,' . $id,
            'locality' => 'required|string|unique:polling_stations,locality,' . $id,
            'building_location' => 'required|string',
            'polling_area' => 'required|string',
            'total_votes' => 'required|numeric',
            'constituency_id' => 'required|exists:constituencies,id',
        ]);

        // Find the polling station by ID
        $pollingStation = PollingStation::findOrFail($id);

        // Update the polling station with the validated data
        $pollingStation->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('pollingstation.index')->with('success', 'Polling Station updated successfully');


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
    public function fetchSections($id){

        $pollingstations = PollingStation::where('constituency_id', $id)->get();

        if ($pollingstations->isEmpty()) {
            return response()->json(['error' => 'Sections not found for the specified polling station.'], 404);
        }

        return response()->json($pollingstations);

    }
}
