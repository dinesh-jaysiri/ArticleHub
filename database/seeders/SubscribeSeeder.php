<?php

namespace Database\Seeders;

use App\Models\Subscribe;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->disableForeignKeys();
        $this->truncate('subscribes');


        // Assuming  have 10 users in your database
        $users = User::take(10)->pluck('id');

        foreach ($users as $userId) {
            $randomSubscribers = $users->random(3); // You can adjust the number of follows

            foreach ($randomSubscribers  as $subscriberId) {
                // Make sure not to create a follow relationship to the same user
                if ($userId !== $subscriberId) {
                    Subscribe::create([
                        'user_id' => $userId,
                        'subscribed_id' => $subscriberId,
                    ]);
                }
            }
        }
        $this->enableForeignKeys();
    }
}
