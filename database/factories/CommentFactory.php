<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'body' => fake()->text(),
            'article_id' => FactoryHelper::getRandomModelid(Article::class),
            'user_id' => FactoryHelper::getRandomModelid(User::class),
            'parent_id' => null

        ];


    }

    
}