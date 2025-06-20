<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarsFormRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
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
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsFormRequest $request)
    {
        // Les données sont déjà validées à ce stade
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('public/voitures');
            $validated['image_path'] = str_replace('public/', '', $path);
        }

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Voiture ajoutée avec succès !');
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
