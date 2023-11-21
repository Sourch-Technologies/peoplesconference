<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $districts = District::withCount('constituencies')->paginate(10);

        return view('district', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-district');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistrictRequest $request)
    {


        $data = $request->validated();


        District::create([
            'name' => $data['name']
        ]);

        return redirect()->to('district')->with('success', 'District Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $district = District::with('constituencies')->findOrFail($id);

        return view('layouts.District.show_district_constituency', compact('district'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $district = District::find($id);


        if (!$district) {

            return response()->back()->with('Error', 'No District Found! Please Try Again');

        }

        return view('edit-district', compact('district'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $data = $request->validate([

            'name' => 'required|string|min:5|unique:districts,name,' . $id

        ]);

        $district = District::find($id);

        if (!$district) {

            return redirect()->route('district.index')->withErrors(['error' => 'No District Found']);

        }

        $district->update([

            'name' => $data['name']

        ]);

        return redirect()->route('district.index')->with('success', 'District updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $district = District::finD($id);

        if (!$district) {

            return redirect()->route('district.index')->withErrors(['error' => 'No District Found']);

        }

        $district->delete();

        return redirect()->route('district.index')->with('success', 'District Deleted successfully');

    }
}
