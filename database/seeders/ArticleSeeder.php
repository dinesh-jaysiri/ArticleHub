<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('articles');
        $this->truncate('article_like');

        //create users
        $articles = Article::factory(20)->create();

        // seeding pivot tables
        foreach ($articles as $article) {
            $article->likes()->sync(User::pluck('id')->random(4));
        }
        $this->enableForeignKeys();
    }
}
