<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        // try to use an existing user if available, otherwise create one
        $user = User::inRandomOrder()->first() ?? User::factory();

        return [
            'subject' => $this->faker->unique()->sentence(3),
            'created_by' => $user instanceof User,
            'views' => $this->faker->numberBetween(0, 50000),
        ];
    }
}
