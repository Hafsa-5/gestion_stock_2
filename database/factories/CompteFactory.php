<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Compte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    protected $model = Compte::class;

    public function definition()
    {

        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => bcrypt('password'), // Vous pouvez utiliser bcrypt pour hasher le mot de passe
            'agent_id' => Agent::pluck('id')->random(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Compte $compte) {
            $role = Role::query()->where('name', $this->faker->randomElement(['Administrateur', 'Utilisateur']))->first();
            $compte->assignRole($role);
        });
    }
}
