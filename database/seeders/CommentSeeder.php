<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('comments');
        $this->truncate('comment_like');

        // Create parent comments
        $comments = Comment::factory(10)->create();



        // Create child comments with parent relationships
        foreach ($comments as $comment) {
            
            // seeding parent comments
            $comment->likes()->sync(User::pluck('id')->random(4));
            $subComments = Comment::factory(3)->create([
                'parent_id' => $comment->id,
                'article_id' => $comment->article_id
            ]);

            // seeding pivot table
            foreach ($subComments as $subComment) {

                $subComment->likes()->sync(User::pluck('id')->random(2));
            }


        }

        $this->enableForeignKeys();
    }


}