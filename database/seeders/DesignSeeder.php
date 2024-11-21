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
                'category' => 'floral'
            ],
            [
                'design_code' => 'N002',
                'product_image_url' => '/images/products/Product-N002.webp',
                'design_url_1' => '/images/designs/N002-1.webp',
                'design_url_2' => '/images/designs/N002-2.webp',
                'color_code' => '#324B87',
                'color_footer' => '#7D9AAB',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N003',
                'product_image_url' => '/images/products/Product-N003.webp',
                'design_url_1' => '/images/designs/N003-1.webp',
                'design_url_2' => '/images/designs/N003-2.webp',
                'color_code' => '#9E5E26',
                'color_footer' => '#B27E2C',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N004',
                'product_image_url' => '/images/products/Product-N004.webp',
                'design_url_1' => '/images/designs/N004-1.webp',
                'design_url_2' => '/images/designs/N004-2.webp',
                'color_code' => '#CA2877',
                'color_footer' => '#DB5E9B',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N005',
                'product_image_url' => '/images/products/Product-N005.webp',
                'design_url_1' => '/images/designs/N005-1.webp',
                'design_url_2' => '/images/designs/N005-2.webp',
                'color_code' => '#5B967F',
                'color_footer' => '#91CCB5',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N006',
                'product_image_url' => '/images/products/Product-N006.webp',
                'design_url_1' => '/images/designs/N006-1.webp',
                'design_url_2' => '/images/designs/N006-2.webp',
                'color_code' => '#CC6579',
                'color_footer' => '#ED95A6',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N007',
                'product_image_url' => '/images/products/Product-N007.webp',
                'design_url_1' => '/images/designs/N007-1.webp',
                'design_url_2' => '/images/designs/N007-2.webp',
                'color_code' => '#FF004A',
                'color_footer' => '#F5648E',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N008',
                'product_image_url' => '/images/products/Product-N008.webp',
                'design_url_1' => '/images/designs/N008-1.webp',
                'design_url_2' => '/images/designs/N008-2.webp',
                'color_code' => '#15183A',
                'color_footer' => '4951AD',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N009',
                'product_image_url' => '/images/products/Product-N009.webp',
                'design_url_1' => '/images/designs/N009-1.webp',
                'design_url_2' => '/images/designs/N009-2.webp',
                'color_code' => '#435796',
                'color_footer' => '#667FD1',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N010',
                'product_image_url' => '/images/products/Product-N010.webp',
                'design_url_1' => '/images/designs/N010-1.webp',
                'design_url_2' => '/images/designs/N010-2.webp',
                'color_code' => '#638A65',
                'color_footer' => '#839B83',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N011',
                'product_image_url' => '/images/products/Product-N011.webp',
                'design_url_1' => '/images/designs/N011-1.webp',
                'design_url_2' => '/images/designs/N011-2.webp',
                'color_code' => '#B28A50',
                'color_footer' => '#D3B788',
                'category' => 'floral'
            ],
            [
                'design_code' => 'N012',
                'product_image_url' => '/images/products/Product-N012.webp',
                'design_url_1' => '/images/designs/N012-1.webp',
                'design_url_2' => '/images/designs/N012-2.webp',
                'color_code' => '#655548',
                'color_footer' => '#7A695D',
                'category' => 'floral'
            ],
            // Add more entries as needed
        ];

        foreach ($designs as $design) {
            Design::create($design);
        }
    }
}
