<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Design;

class DesignSeeder extends Seeder
{
    public function run()
    {
        $designs = [
            [
                'design_code' => 'N001',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N001-2.webp',
                'color_code' => '#FF5733',
                'color_footer' => '#33FF57',
            ],
            [
                'design_code' => 'N002',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N003',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N004',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N005',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],

            // Add more entries as needed
        ];

        foreach ($designs as $design) {
            Design::create($design);
        }
    }
}
