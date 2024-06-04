<?php

namespace App\Http\Controllers;


use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = member::all();
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // Other controller methods...



    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Ic_No' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Retrieve the authenticated user's volunteer ID
        $VolunteerId = Auth::user()->volunteer->id;


        // Create a new member instance and save to the database
        $member = member::create([
            'Name' => $validatedData['Name'],
            'Ic_No' => $validatedData['Ic_No'],
            'Address' => $validatedData['Address'],
            'PhoneNumber' => $validatedData['PhoneNumber'],
            'VolunteerId' => $VolunteerId,
        ]);

        // Redirect to the index route with a success message
        return redirect()->route('member.index')->with('success', 'Member added successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show(member $member)
    {

        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, member $member)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Ic_No' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the member with the validated data
        $member->update($validatedData);

        // Redirect back to the member details page with a success message
        return redirect()->route('member.show', $member->id)->with('success', 'Member details updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(member $member)
    {
        $member->delete();

        // Redirect back to the member list page with a success message
        return redirect()->route('member.index')->with('success', 'Members deleted successfully.');
    }
}
