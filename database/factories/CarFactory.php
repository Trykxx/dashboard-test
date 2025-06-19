<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carburants = ['essence', 'diesel', 'électrique', 'hybride'];
        $transmissions = ['automatique', 'manuelle'];
        $couleurs = ['rouge', 'noir', 'blanc', 'bleu', 'gris'];

        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        return [
            'marque' => $faker->vehicleBrand(),
            "modele" =>  $faker->vehicleModel(),
            "annee" =>  fake()->numberBetween(2000, 2025),
            "couleur" =>  Arr::random($couleurs),
            "nb_portes" =>  fake()->numberBetween(3, 5),
            "carburant" =>  Arr::random($carburants),
            "transmission" =>  Arr::random($transmissions),
            "prix" =>  fake()->randomFloat(2, 5000, 100000),
            "kilometrage" =>  fake()->numberBetween(0, 200000),
            "description" =>  fake()->sentence(10),
            "image_path" => function () {
                return 'https://picsum.photos/640/480?car' . '?id=' . fake()->uuid();
            },
        ];
    }
}