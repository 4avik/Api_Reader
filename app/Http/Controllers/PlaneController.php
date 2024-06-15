<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Plane $plane)
    {

    }

    public function getData() {
        $planes = Plane::all();
        return $planes->toJson();
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|string',
            'type' => 'required|string',
            'country' => 'required|string',
            'speed' => 'required|string',
        ]);

        $plane = new Plane([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'year' => $validatedData['year'],
            'type' => $validatedData['type'],
            'country' => $validatedData['country'],
            'speed' => $validatedData['speed'],
        ]);

        $plane->save();

        return redirect()->route('dashboard')->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function getOtherData(Plane $plane, Request $request)
    {
        $client = new Client();

        $validatedData = $request->validate([
            'url' => 'required|string|max:255',
        ]);

        $url = $validatedData['url'];

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plane $plane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plane $plane)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plane $plane)
    {
        //
    }
}
