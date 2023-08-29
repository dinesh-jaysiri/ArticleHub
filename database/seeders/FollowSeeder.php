<?php

namespace Database\Seeders;

use App\Models\Follow;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('follows');


        // Assuming you have 10 users in your database
        $users = User::pluck('id');

        foreach ($users as $userId) {
            $randomFollows = $users->random(3); // You can adjust the number of follows

            foreach ($randomFollows as $followedId) {
                // Make sure not to create a follow relationship to the same user
                if ($userId !== $followedId) {
                    Follow::create([
                        'user_id' => $userId,
                        'followed_id' => $followedId,
                    ]);
                }
            }
        }
        $this->enableForeignKeys();
    }
}
