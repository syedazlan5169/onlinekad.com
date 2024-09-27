<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guestbook>
 */
class GuestbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kad_id' => rand(1,15),
            'author' => $this->faker->name(), // Generate a random author name
            'wish' => $this->faker->sentence(20), // Generate a random wish
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
