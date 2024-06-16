<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData() {
        $plants = Plant::all();
        return $plants->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'species' => 'required|string',
            'family' => 'required|string',
            'origin' => 'required|string',
            'bloom_time' => 'required|string',
        ]);

        $plant = new Plant([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'species' => $validatedData['species'],
            'family' => $validatedData['family'],
            'origin' => $validatedData['origin'],
            'bloom_time' => $validatedData['bloom_time'],
        ]);

        $plant->save();

        return redirect()->route('dashboard')->with('success', 'Plant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        //
    }

    public function getOtherData(Plant $plant, Request $request)
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        //
    }
}
