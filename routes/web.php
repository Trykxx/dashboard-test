<?php

use App\Exports\CarsExport;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Route
Route::get('/', function () {
    return view('home')->name('home');
});

// Auth Routes
Auth::routes(); // Ajoute les routes d'authentification classiques

Route::middleware(['auth'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    Route::get('/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::patch('/cars/{car}', [CarController::class, 'update'])->name('cars.update');

    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    Route::get('/export/cars', function () {
        return Excel::download(new CarsExport, 'cars.xlsx');
    })->name('export.cars');
});
