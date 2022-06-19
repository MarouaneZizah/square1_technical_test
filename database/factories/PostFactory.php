<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'            => $this->faker->sentence(),
            'slug'             => $this->faker->unique()->slug(),
            'description'      => $this->faker->text(),
            'publication_date' => $this->faker->dateTime(),
            'user_id'          => User::factory()->create()->id,
        ];
    }
}
