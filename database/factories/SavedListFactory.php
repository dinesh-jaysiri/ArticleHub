<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SavedList>
 */
class SavedListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->name(),
            'user_id' => FactoryHelper::getRandomModelid(User::class)
            // $table->string('name',255);

            // $table->foreignId('user_id');
        ];
    }
}
