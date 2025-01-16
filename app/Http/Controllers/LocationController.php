<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locations = Location::all();
        return view('location.index' , compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $clients = Client::all();

        return view('location.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());
         // Define validation rules
    $validator = Validator::make($request->all(), [
        'location_name'   => 'required',
        'longitude'       => 'required',
        'latitude'        => 'required',
        'radius_in_meters'=> 'required',
        'client_id'       => 'required|exists:clients,id',
        'is_active'       => 'nullable',
    ]);
    // dd($validator);
    // Handle validation failure
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Get validated data
    $validatedData = $validator->validated();

    // Create and store the location
    Location::create([
        'location_name'    => $validatedData['location_name'],
        'longitude'        => $validatedData['longitude'],
        'latitude'         => $validatedData['latitude'],
        'allowed_radius_in_meters' => $validatedData['radius_in_meters'],
        'client_id'        => $validatedData['client_id'],
        'is_active'        =>  $request->input('is_active', 0),
        'created_by' => auth()->user()->id,
    ]);

    // Redirect back with a success message
    return redirect()->route('location.index')->with('success', 'Location added successfully!');

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
        $location = Location::find($id);

        $clients = Client::all();

        return view('location.edit', compact('location', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $location = Location::find($id);
        $validator = Validator::make($request->all(), [
            'location_name'   => 'required',
            'longitude'       => 'required',
            'latitude'        => 'required',
            'radius_in_meters'=> 'required',
            'client_id'       => 'required|exists:clients,id',
            'is_active'       => 'nullable',
        ]);
        // dd($validator);
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Get validated data
        $validatedData = $validator->validated();
    
        // Create and store the location
        $location->update([
            'location_name'    => $validatedData['location_name'],
            'longitude'        => $validatedData['longitude'],
            'latitude'         => $validatedData['latitude'],
            'allowed_radius_in_meters' => $validatedData['radius_in_meters'],
            'client_id'        => $validatedData['client_id'],
            'is_active'        =>  $request->input('is_active', 0),
            'created_by' => auth()->user()->id,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('location.index')->with('success', 'Location updated successfully!');
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $location = Location::find($id);
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Location deleted successfully!');
    }
}
