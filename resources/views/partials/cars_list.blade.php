<table class="table card-table table-vcenter text-nowrap datatable">
    <thead>
        <tr>
            <th class="w-1">
                <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices">
            </th>
            <th>ID</th>
            <th>Marque</th>
            <th>Modele</th>
            <th>Annee</th>
            <th>Couleur</th>
            <th>Nb de portes</th>
            <th>Prix</th>
            <th>Carburant</th>
            <th>Transmission</th>
            <th>Kilometrage</th>
            <th>Description</th>
            <th>Date de creation</th>
            <th>Date de modification</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">{{ $car->id }}</span></td>
                <td><a href="{{ route('cars.show', $car->id) }}" class="text-reset"
                        tabindex="-1">{{ $car->marque }}</a></td>
                <td>{{ $car->modele }}</td>
                <td>{{ $car->annee }}</td>
                <td>{{ $car->couleur }}</td>
                <td>{{ $car->nb_portes }}</td>
                <td>{{ $car->prix }} €</td>
                <td>{{ $car->carburant }}</td>
                <td>{{ $car->transmission }}</td>
                <td>{{ $car->kilometrage }}</td>
                <td>{{ Str::limit($car->description, 50) }}</td>
                <td>{{ $car->created_at }}</td>
                <td>{{ $car->updated_at }}</td>
                <td><a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Modifier</a></td>
                <td>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
