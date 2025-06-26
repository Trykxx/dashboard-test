<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CarsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Car::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Marque',
            'Modèle',
            'Année',
            'Prix',
            'Couleur',
            'Portes',
            'Carburant',
            'Transmission',
            'Kilométrage',
            'Description',
            'Créé le',
            'Mis à jour le'
        ];
    }

    public function map($car): array
    {
        return [
            $car->id,
            $car->marque,
            $car->modele,
            $car->annee,
            $car->prix,
            $car->couleur,
            $car->nb_portes,
            $car->carburant,
            $car->transmission,
            $car->kilometrage,
            $car->created_at,
            $car->updated_at
        ];
    }
}
