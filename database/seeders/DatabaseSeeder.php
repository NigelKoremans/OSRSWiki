<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Article::factory()->count(20)
            ->create()
            ->each(function ($article) {
                Revision::factory()
                    ->count(rand(1, 5))
                    ->create([
                        'article_id' => $article->id,
                        'edited_by' => User::inRandomOrder()->first()->id,
                    ]);
            });
    }
}
