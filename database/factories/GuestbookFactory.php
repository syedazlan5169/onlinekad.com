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
            'kad_id' => 1,
            'author' => $this->faker->name(), // Generate a random author name
            'wish' => $this->faker->sentence(20), // Generate a random wish
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withKadId($kadId)
    {
        return $this->state(function (array $attributes) use ($kadId) {
            return [
                'kad_id' => $kadId,
            ];
        });
    }
}
