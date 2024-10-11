<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rsvp>
 */
class RsvpFactory extends Factory
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
            'nama' => $this->faker->name,
            'nombor_telefon' => $this->faker->phoneNumber,
            'jumlah_kehadiran' => $this->faker->numberBetween(1, 5),
            'kehadiran' => $this->faker->randomElement(['Hadir', 'Tidak Hadir']), // You can define your own statuses
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
