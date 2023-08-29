<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ReadingHistory;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReadingHistorySeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('reading_histories');


        // Assuming you have 10 users in your database
        $users = User::pluck('id');
        $articles = Article::pluck('id');

        foreach ($users as $userId) {
            $randomArticles = $articles->random(3); 

            foreach ($randomArticles as $articleId) {
               
                    ReadingHistory::create([
                        'user_id' => $userId,
                        'article_id' => $articleId,
                        'read_at' => fake()->dateTime()
                    ]);
                
            }
        }
        $this->enableForeignKeys();
    }
}
