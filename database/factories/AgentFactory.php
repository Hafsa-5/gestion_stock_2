<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Entite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    protected $model = Agent::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'entite_id' => Entite::pluck('id')->random(),
        ];
    }
}
