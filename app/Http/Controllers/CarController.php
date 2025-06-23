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
        return view('cars.form', ['car' => new Car()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsFormRequest $request)
    {
        // Les données sont déjà validées à ce stade
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('assets/images/cars', 'public');
            $validated['image_path'] = $path;
        }

        Car::create($validated);

        return redirect()->route('home')->with('success', 'Voiture ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars/show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.form', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $data = $request->validated();
        $car->update($data);

        return redirect()->route('cars.show', $car->id)->with('success', 'La voiture a été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
