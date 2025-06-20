@extends('tablar::page')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter une voiture</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="marque">Marque</label>
                        <input type="text" class="form-control @error('marque') is-invalid  @enderror" name="marque"
                            id="marque" value="{{ old('marque') }}">
                        @error('marque')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="modele">Modele</label>
                        <input type="text" class="form-control @error('modele') is-invalid  @enderror" name="modele"
                            id="modele" value="{{ old('modele') }}">
                        @error('modele')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="annee">Annee</label>
                        <input type="number" class="form-control @error('annee') is-invalid  @enderror" name="annee"
                            id="annee" value="{{ old('annee') }}">
                        @error('annee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="couleur">Couleur</label>
                        <input type="text" class="form-control @error('couleur') is-invalid  @enderror" name="couleur"
                            id="couleur" value="{{ old('couleur') }}">
                        @error('couleur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nb_portes">Nombre de portes</label>
                        <input type="number" class="form-control @error('nb_portes') is-invalid  @enderror"
                            name="nb_portes" id="nb_portes" value="{{ old('nb_portes') }}">
                        @error('nb_portes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="carburant" class="form-label">Type de carburant</label>
                        <select name="carburant" id="carburant"
                            class="form-select @error('carburant') is-invalid  @enderror">
                            <option value="" disabled selected>Sélectionnez...</option>
                            <option value="diesel" @selected(old('carburant') == 'diesel')>Diesel</option>
                            <option value="essence" @selected(old('carburant') == 'essence')>Essence</option>
                            <option value="hybride" @selected(old('carburant') == 'hybride')>Hybride</option>
                            <option value="electrique" @selected(old('carburant') == 'electrique')>Électrique</option>
                        </select>
                        @error('carburant')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="transmission" class="form-label">Type de transmission</label>
                        <select name="transmission" id="transmission"
                            class="form-select @error('transmission') is-invalid  @enderror">
                            <option value="" disabled selected>Sélectionnez...</option>
                            <option value="manuelle" @selected(old('transmission') == 'manuelle')>Manuelle</option>
                            <option value="automatique" @selected(old('transmission') == 'automatique')>Automatique</option>
                        </select>
                        @error('transmission')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="prix">Prix</label>
                        <input type="number" class="form-control @error('prix') is-invalid  @enderror" name="prix"
                            id="prix" value="{{ old('prix') }}">
                        @error('prix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kilometrage">Kilométrage</label>
                        <input type="number" class="form-control @error('carburant') is-invalid  @enderror"
                            name="kilometrage" id="kilometrage" value="{{ old('kilometrage') }}">
                        @error('kilometrage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid  @enderror" name="description" id="description"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image_path">Image</label>
                        <input type="file" class="form-control @error('image_path') is-invalid  @enderror"
                            name="image_path" id="image_path">
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@endsection