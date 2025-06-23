@extends('tablar::page')

@section('title', $car->exists ? 'Editer une voiture' : 'Ajouter une nouvelle voiture')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter une voiture</h3>
            </div>
            <div class="card-body">
                <form action="{{ $car->exists ? route('cars.update', $car) : route('cars.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($car->exists)
                        @method('PUT')
                    @endif

                    @include('shared.input', [
                        'label' => 'Marque',
                        'name' => 'marque',
                        'value' => $car->marque,
                    ])

                    @include('shared.input', [
                        'label' => 'Modèle',
                        'name' => 'modele',
                        'value' => $car->modele,
                    ])

                    @include('shared.input', [
                        'label' => 'Année',
                        'name' => 'annee',
                        'value' => $car->annee,
                    ])

                    @include('shared.input', [
                        'label' => 'Couleur',
                        'name' => 'couleur',
                        'value' => $car->couleur,
                    ])

                    @include('shared.input', [
                        'label' => 'Nombre de portes',
                        'name' => 'nb_portes',
                        'value' => $car->nb_portes,
                        'type' => 'number',
                    ])

                    @include('shared.select', [
                        'label' => 'Type de carburant',
                        'name' => 'carburant',
                        'value' => $car->carburant,
                        'options' => [
                            'essence' => 'Essence',
                            'diesel' => 'Diesel',
                            'électrique' => 'Électrique',
                            'hybride' => 'Hybride',
                        ],
                    ])

                    @include('shared.select', [
                        'label' => 'Type de transmission',
                        'name' => 'transmission',
                        'value' => $car->transmission,
                        'options' => [
                            'automatique' => 'Automatique',
                            'manuelle' => 'Manuelle',
                        ],
                    ])

                    @include('shared.input', [
                        'label' => 'Prix',
                        'name' => 'prix',
                        'value' => $car->prix,
                        'type' => 'number',
                    ])

                    @include('shared.input', [
                        'label' => 'Kilométrage',
                        'name' => 'kilometrage',
                        'value' => $car->kilometrage,
                        'type' => 'number',
                    ])

                    @include('shared.input', [
                        'label' => 'Description',
                        'name' => 'description',
                        'value' => $car->description,
                        'type' => 'textarea',
                    ])

                    @if ($car->image_path)
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <img src="{{ asset($car->image_path) }}" alt="Image voiture" width="150">
                        </div>
                    @else
                        @include('shared.input', [
                            'type' => 'file',
                            'label' => 'Image',
                            'name' => 'image_path',
                        ])
                    @endif

                    <button type="submit" class="btn btn-primary">
                        @if ($car->exists)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
