<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\SavedList;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavedListSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('saved_lists');
        $this->truncate('article_saved_list');
        
        // seeding saved_list table
        $savedLists = SavedList::factory(20)->create();

        // seeding pivot table
        foreach ($savedLists as $savedList) {
            $savedList->articles()->sync(Article::pluck('id')->random(3));
        }

        $this->enableForeignKeys();
    }
}
