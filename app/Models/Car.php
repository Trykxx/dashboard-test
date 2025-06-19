<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "marque",
        "modele",
        "annee",
        "couleur",
        "nb_portes",
        "carburant",
        "transmission",
        "prix",
        "kilometrage",
        "description",
        'image_path'
    ];

    // Getter image
    public function getImageUrl()
    {
        if ($this->image_path) {
            return asset("storage/" . $this->image_path);
        }
        return asset('assets/images/cars/default-car.jpg');
    }
}
