@extends('tablar::page')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                                @if (Str::startsWith($car->image_path, ['http', 'https']))
                                    <img src="{{ $car->image_path }}" alt="Photo {{ $car->marque }} {{ $car->modele }}">
                                @else
                                    <img src="{{ asset('storage/' . $car->image_path) }}"
                                        alt="Photo {{ $car->marque }} {{ $car->modele }}">
                                @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h2 class="card-title mb-3">{{ $car->marque }} {{ $car->modele }}</h2>
                                <h3 class="text-primary fw-bold mb-3">{{ number_format($car->prix, 0, '', ' ') }} €</h3>
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th>Année :</th>
                                        <td>{{ $car->annee }}</td>
                                    </tr>
                                    <tr>
                                        <th>Couleur :</th>
                                        <td>{{ $car->couleur }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nb portes :</th>
                                        <td>{{ $car->nb_portes }}</td>
                                    </tr>
                                    <tr>
                                        <th>Carburant :</th>
                                        <td>{{ $car->carburant }}</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission :</th>
                                        <td>{{ $car->transmission }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kilométrage :</th>
                                        <td>{{ number_format($car->kilometrage, 0, '', ' ') }} km</td>
                                    </tr>
                                </table>
                                <div class="mt-4">
                                    <h4>Description :</h4>
                                    <p class="text-muted" style="white-space: pre-wrap;">{{ $car->description }}</p>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Retour à la
                                        liste</a>
                                </div>
                                <div class="d-flex justify-content-center gap-2 mt-2">
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">
                                        Modifier
                                    </a>

                                    {{-- Bouton supprimer avec confirmation --}}
                                    <form action="{{ route('cars.destroy', $car) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('shared.flash')
    @endsection
