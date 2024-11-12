<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'id' => 1,
                'kad_id' => 1,
            ],
            [
                'id' => 2,
                'kad_id' => 2,
            ],
            [
                'id' => 3,
                'kad_id' => 3,
            ],
        ];

        foreach ($sliders as $slider)
        {
            Slider::create($slider);
        }
    }
}
