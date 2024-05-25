<?php

namespace Database\Factories;

use App\Models\Entite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entite>
 */
class EntiteFactory extends Factory
{
    protected $model = Entite::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
