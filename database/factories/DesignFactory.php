<?php

namespace Database\Factories;

use App\Models\Design;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignFactory extends Factory
{
    protected $model = Design::class;

    private static $designCodeCounter = 1;

    public function definition()
    {
        $designCode = 'N' . str_pad(self::$designCodeCounter, 3, '0', STR_PAD_LEFT);
        $designUrl1 = "/images/designs/{$designCode}-1.webp";
        $designUrl2 = "/images/designs/{$designCode}-2.webp";
        
        // Increment the counter for the next entry
        self::$designCodeCounter++;

        return [
            'design_code' => $designCode,
            'design_url_1' => $designUrl1,
            'design_url_2' => $designUrl2,
            'color_code' => $this->faker->hexcolor,
            'color_footer' => $this->faker->hexcolor,
        ];
    }
}
