<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Contrat;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
            'prix_unitaire' => $this->faker->randomFloat(2, 10, 100),
            'quantite_stock' => $this->faker->numberBetween(1, 100),
            'contrat_id' => Contrat::pluck('id')->random(),
            'demande_id' => Demande::pluck('id')->random(),
        ];
    }
}
