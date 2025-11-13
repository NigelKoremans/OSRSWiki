<?php

namespace Database\Factories;

use App\Models\Revision;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revision>
 */
class RevisionFactory extends Factory
{
    protected $model = Revision::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? User::factory();
        $article = Article::inRandomOrder()->first() ?? Article::factory();

        return [
            'content' => $this->faker->paragraphs(rand(3,7), true),
            'summary' => $this->faker->sentence(),
            'edited_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'edited_by' => $user instanceof User ? $user->id : $user,
            'article_id' => $article instanceof Article ? $article->id : $article,
        ];
    }
}
