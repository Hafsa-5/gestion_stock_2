<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    protected $model = Demande::class;

    public function definition()
    {
        return [
            'date_demande' => $this->faker->date(),
            'statut' => $this->faker->randomElement(['en_attente', 'en_cours', 'terminee']),
            'agent_id' => Agent::pluck('id')->random(),
        ];
    }
}
