<?php

namespace Database\Factories;

use App\Models\Contrat;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrat>
 */
class ContratFactory extends Factory
{
    protected $model = Contrat::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'adresse' => $this->faker->address,
            'capacite' => $this->faker->randomNumber(),
            'fournisseur_id' => Fournisseur::pluck('id')->random(),
        ];
    }
}
