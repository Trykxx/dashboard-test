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
        $query = Car::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('marque', 'like', "%{$search}%")
                ->orWhere('modele', 'like', "%{$search}%");
        }

        $cars = $query->paginate(10);

        return view('home', ['cars' => $cars]);
    }
}
