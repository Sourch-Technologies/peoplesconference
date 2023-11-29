<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\Memeber;
use App\Models\SectionName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {


            $members = Memeber::where('name', 'LIKE', '%' . $query . '%')
                ->with([
                    'sectionname.pollingstation.constituency.district',
                ])->paginate(10)->appends(['query' => $query]);

//            dd($members);
            $member_count = Memeber::all()->count();

            return view('layouts.Member.members', compact('member_count', 'members'));

        } else {
            $members = Memeber::with([
                    'sectionname.pollingstation.constituency.district',
                ])->paginate(10)->appends(['query' => $query]);

            $member_count = Memeber::all()->count();

            return view('layouts.Member.members', compact('member_count', 'members'));
        }
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('is_admin');

        $sectionNames = SectionName::select('name', 'id')->get();

        return view('layouts.Member.create-member', compact('sectionNames'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Memeber $memeber)
    {

        $this->authorize('is_admin');

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:M,F,O',
            'photo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'section_name_id' => 'required|exists:section_names,id',

        ]);


        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $file = $request->file('photo');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('public/photos', $fileName);

        }

        $memeber->create([

            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'gender' => $validatedData['gender'],
            'photo' => $fileName,
            'section_name_id' => $validatedData['section_name_id']

        ]);

        // Redirect to a success page or wherever you want
        return redirect()->route('member.index')->with('success', 'Member created successfully.');


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

        $this->authorize('is_admin');

        $member = Memeber::query()->findOrFail($id);

        $sectionnames = SectionName::all();

        return view('layouts.Member.edit-member', compact('member', 'sectionnames'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->authorize('is_admin');

        $member = Memeber::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $id . ',id',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:M,F,O',
            'photo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'section_name_id' => 'required|exists:section_names,id',
        ]);

        $validatedData = $request->only(['name', 'email', 'phone', 'gender', 'section_name_id']);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            if ($member->photo) {
                Storage::delete('public/photos/' . $member->photo);
            }

            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/photos', $fileName);
            $validatedData['photo'] = $fileName;

        }

        $member->update($validatedData);

        return redirect()->route('member.index')->with('success', 'Member updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->authorize('is_admin');

        $member = Memeber::query()->findOrFail($id);

        if ($member->photo) {
            Storage::delete('public/photos/' . $member->photo);
        }

        $member->destroy($id);

        return redirect()->back()->with('success', 'Member Deleted');

    }
}
