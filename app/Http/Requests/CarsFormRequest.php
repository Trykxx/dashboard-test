<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marque' => 'required|string|max:50',
            'modele' => 'required|string|max:50',
            'annee' => 'required|integer|min:1900|max:' . date('Y'),
            'couleur' => 'required|string|max:30',
            'nb_portes' => 'required|integer|min:1|max:6',
            'carburant' => 'required',
            'transmission' => 'required',
            'prix' => 'required|numeric|min:0',
            'kilometrage' => 'required|integer|min:0',
            'description' => 'required|string|max:1000',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048', // 2MB max
        ];
    }

    public function messages()
{
    return [
        'marque.required' => 'La marque du véhicule est obligatoire',
        'marque.string' => 'La marque doit être du texte',
        'marque.max' => 'La marque ne peut dépasser 50 caractères',

        // Modèle
        'modele.required' => 'Le modèle du véhicule est obligatoire',
        'modele.string' => 'Le modèle doit être du texte',
        'modele.max' => 'Le modèle ne peut dépasser 50 caractères',

        // Année
        'annee.required' => "L'année du véhicule est obligatoire",
        'annee.integer' => "L'année doit être un nombre entier",
        'annee.min' => "L'année doit être supérieure à 1900",
        'annee.max' => "L'année ne peut pas être dans le futur",

        // Couleur
        'couleur.required' => 'La couleur du véhicule est obligatoire',
        'couleur.string' => 'La couleur doit être du texte',
        'couleur.max' => 'La couleur ne peut dépasser 30 caractères',

        // Nombre de portes
        'nb_portes.required' => 'Le nombre de portes est obligatoire',
        'nb_portes.integer' => 'Le nombre de portes doit être un nombre entier',
        'nb_portes.min' => 'Le véhicule doit avoir au moins 1 porte',
        'nb_portes.max' => 'Le véhicule ne peut avoir plus de 6 portes',

        // Carburant
        'carburant.required' => 'Le type de carburant est obligatoire',

        // Transmission
        'transmission.required' => 'Le type de transmission est obligatoire',

        // Prix
        'prix.required' => 'Le prix du véhicule est obligatoire',
        'prix.numeric' => 'Le prix doit être un nombre',
        'prix.min' => 'Le prix ne peut pas être négatif',

        // Kilométrage
        'kilometrage.required' => 'Le kilométrage du véhicule est obligatoire',
        'kilometrage.integer' => 'Le kilométrage doit être un nombre entier',
        'kilometrage.min' => 'Le kilométrage ne peut pas être négatif',

        // Description
        'description.required' => 'La description du véhicule est obligatoire',
        'description.string' => 'La description doit être du texte',
        'description.max' => 'La description ne peut dépasser 1000 caractères',

        // Image
        'image_path.required' => "L'image du véhicule est obligatoire",
        'image_path.image' => "Le fichier doit être une image valide",
        'image_path.mimes' => "L'image doit être au format JPEG, PNG ou JPG",
        'image_path.max' => "L'image ne doit pas dépasser 2 Mo"
    ];
}
}
