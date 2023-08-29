<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        $this->truncate('users');
        User::factory(12)->create();
        
        $this->enableForeignKeys();
    }
}