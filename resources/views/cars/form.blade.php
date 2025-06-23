@extends('tablar::page')

{{-- @section('title', $car->exists ? 'Editer une voiture' : 'Ajouter une nouvelle voiture') --}}

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter une voiture</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                        'value' => $car->kilometrage,
                        'type' => 'textarea',
                    ])

                    @include('shared.input', [
                        'label' => 'Image',
                        'name' => 'image_path',
                        'value' => $car->image_path,
                        'type' => 'file',
                    ])

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
