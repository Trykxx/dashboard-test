@extends('tablar::page')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Ajouter une voiture</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Marque</label>
                    <input type="text" class="form-control" name="brand" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Modele</label>
                    <input type="text" class="form-control" name="model" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Annee</label>
                    <input type="text" class="form-control" name="year" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Couleur</label>
                    <input type="text" class="form-control" name="color" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre de portes</label>
                    <input type="text" class="form-control" name="doors" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type de carburant</label>
                    <input type="text" class="form-control" name="fuel" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type de transmission</label>
                    <input type="text" class="form-control" name="transmission" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prix</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kilométrage</label>
                    <input type="text" class="form-control" name="kilometers" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection