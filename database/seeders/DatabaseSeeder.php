<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = Tag::factory(40)->create();
        $articles = Article::factory()->count(3);
        $users = User::factory(10)
            ->has($articles)
            ->create();

        // TODO: figure out how to seed random articles and tags uniquely to satisfy index constraints
        ArticleTag::factory()
            ->count(20)
            ->create();
            // ->each(function($articleTag) use ($tags, $createdArticles) {
            //     $articleTag->tag_id = $tags->random(1)->pluck('id');
            //     $articleTag->article_id = $createdArticles->random(1)->pluck('id');
            //     $articleTag->save();
            // });

        foreach ($articles as $article) {
            $randomUserIds = collect($users)
                ->random(3)
                ->pluck('id');
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
