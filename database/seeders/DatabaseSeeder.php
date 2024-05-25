<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agent;
use App\Models\Article;
use App\Models\Compte;
use App\Models\Contrat;
use App\Models\Demande;
use App\Models\Entite;
use App\Models\Fournisseur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        Entite::factory()->count(5)->create();
        Agent::factory()->count(10)->create();
        Compte::factory()->count(10)->create();
        Fournisseur::factory()->count(10)->create();
        Demande::factory()->count(10)->create();
        Contrat::factory()->count(50)->create();
        Article::factory()->count(120)->create();
    }
}
