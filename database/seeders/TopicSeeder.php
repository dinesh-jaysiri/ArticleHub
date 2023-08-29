<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('topics');
        $this->truncate('topic_user');
        $this->truncate('article_topic');

        //seeding users table
        $topics = Topic::factory(12)->create();

        // seeding pivot tables
        foreach ($topics as $topic) {
            $topic->followers()->sync(User::pluck('id')->random(4));
            $topic->articles()->sync(Article::pluck('id')->random(4));
        }
        $this->enableForeignKeys();
    }
}