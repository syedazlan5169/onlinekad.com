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
                'color_code' => '#DAA520',
                'color_footer' => '#F3DBB5',
            ],
            [
                'design_code' => 'N002',
                'product_image_url' => '/images/products/Product-N002.webp',
                'design_url_1' => '/images/designs/N002-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#324B87',
                'color_footer' => '#7D9AAB',
            ],
            [
                'design_code' => 'N003',
                'product_image_url' => '/images/products/Product-N003.webp',
                'design_url_1' => '/images/designs/N003-1.webp',
                'design_url_2' => '/images/designs/N003-2.webp',
                'color_code' => '#9E5E26',
                'color_footer' => '#B27E2C',
            ],
            [
                'design_code' => 'N004',
                'product_image_url' => '/images/products/Product-N004.webp',
                'design_url_1' => '/images/designs/N004-1.webp',
                'design_url_2' => '/images/designs/N004-2.webp',
                'color_code' => '#CA2877',
                'color_footer' => '#DB5E9B',
            ],
            [
                'design_code' => 'N005',
                'product_image_url' => '/images/products/Product-N005.webp',
                'design_url_1' => '/images/designs/N005-1.webp',
                'design_url_2' => '/images/designs/N005-2.webp',
                'color_code' => '#5B967F',
                'color_footer' => '#91CCB5',
            ],
            [
                'design_code' => 'N006',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N007',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N008',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N009',
                'product_image_url' => '/images/products/Product-N001.webp',
                'design_url_1' => '/images/designs/N001-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#33C1FF',
                'color_footer' => '#FFC133',
            ],
            [
                'design_code' => 'N010',
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
