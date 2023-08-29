<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(FollowSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(ReadingHistorySeeder::class);
        $this->call(SavedListSeeder::class);
        $this->call(SubscribeSeeder::class);
        
    }
}
