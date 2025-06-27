@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('export.cars') }}" class="btn btn-success mb-2">Exporter toutes les voitures (Excel)</a>
                        {{-- <button onclick="window.location='{{ route('cars.export') }}'" class="btn btn-success mb-2">
                            Exporter toutes les voitures (Excel)
                        </button> --}}


                        <a href={{ route('cars.create') }} class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Ajouter une nouvelle voiture
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('shared.flash')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Liste de Voitures</h2>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex align-items-center">
                                <form method="GET" action="{{ route('home') }}">
                                    <span class="ms-3 text-muted">
                                        Afficher
                                        <input type="number" min="1" name="per_page"
                                            class="form-control form-control-sm d-inline-block"
                                            value="{{ request('per_page', 10) }}"
                                            style="width: 60px; display: inline-block;"
                                            aria-label="Nombre d'éléments par page" onchange="this.form.submit();">
                                        éléments
                                    </span>
                                </form>

                                <div class="ms-auto text-muted">
                                    <form method="GET" action="{{ route('home') }}" class="mb-0">
                                        <div class="input-group input-group-sm gap-2">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Marque ou Modèle..." value="{{ request('search') }}">
                                            <button class="btn btn-primary" type="submit">Rechercher</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="carsList">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        @include('shared.sortLink')

                                        <th>{!! sort_link('id', 'ID') !!}</th>
                                        <th>{!! sort_link('marque', 'Marque') !!}</th>
                                        <th>{!! sort_link('modele', 'Modèle') !!}</th>
                                        <th>{!! sort_link('annee', 'Année') !!}</th>
                                        <th>{!! sort_link('couleur', 'Couleur') !!}</th>
                                        <th>{!! sort_link('nb_portes', 'Nombre de portes') !!}</th>
                                        <th>{!! sort_link('prix', 'Prix') !!}</th>
                                        <th>{!! sort_link('carburant', 'Carburant') !!}</th>
                                        <th>{!! sort_link('transmission', 'Transmission') !!}</th>
                                        <th>{!! sort_link('kilometrage', 'Kilométrage') !!}</th>
                                        <th>Description</th>
                                        <th>{!! sort_link('created_at', 'Date de création') !!}</th>
                                        <th>{!! sort_link('updated_at', 'Date de modification') !!}</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>
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
                                            <td><a href="{{ route('cars.edit', $car->id) }}"
                                                    class="btn btn-primary">Modifier</a></td>
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
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $cars->withQueryString()->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection