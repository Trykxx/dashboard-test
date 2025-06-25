<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $query = Car::query();

        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('marque', 'like', "%{$search}%")
                ->orWhere('modele', 'like', "%{$search}%");
        }

        if (in_array($sort, ['id', 'marque', 'modele', 'annee', 'couleur', 'nb_portes', 'prix', 'carburant', 'transmission', 'kilometrage', 'created_at', 'updated_at'])) {
            $query->orderBy($sort, $direction);
        }

        $cars = $query->paginate($perPage);

        return view('home', ['cars' => $cars]);
    }
}
