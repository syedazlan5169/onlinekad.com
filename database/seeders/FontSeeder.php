<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Font;

class FontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fonts = [
            [
                'id' => '1',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Great+Vibes&display=swap',
                'font_name' => 'Great Vibes',
            ],
            [
                'id' => '2',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap',
                'font_name' => 'Dancing Script',
            ],
            [
                'id' => '3',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap',
                'font_name' => 'Alex Brush',
            ],
            [
                'id' => '4',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Parisienne&display=swap',
                'font_name' => 'Parisienne',
            ],
            [
                'id' => '5',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Montez&display=swap',
                'font_name' => 'Montez',
            ],
            [
                'id' => '6',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Updock&display=swap',
                'font_name' => 'Updock',
            ],
            [
                'id' => '7',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Satisfy&display=swap',
                'font_name' => 'Satisfy',
            ],
            [
                'id' => '8',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Sacramento&display=swap',
                'font_name' => 'Sacramento',
            ],
            [
                'id' => '9',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Allura&display=swap',
                'font_name' => 'Allura',
            ],
            [
                'id' => '10',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Qwigley&display=swap',
                'font_name' => 'Qwigley',
            ],
            [
                'id' => '11',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap',
                'font_name' => 'Fleur De Leah',
            ],
            [
                'id' => '12',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap',
                'font_name' => 'Playfair Display',
            ],
            [
                'id' => '13',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap',
                'font_name' => 'Imperial Script',
            ],
            [
                'id' => '14',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Mea+Culpa&display=swap',
                'font_name' => 'Mea Culpa',
            ],
            [
                'id' => '15',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap',
                'font_name' => 'Tangerine',
            ],
            [
                'id' => '16',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Rouge+Script&display=swap',
                'font_name' => 'Rouge Script',
            ],
            [
                'id' => '17',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Yesteryear&display=swap',
                'font_name' => 'Yesteryear',
            ],
            [
                'id' => '18',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Niconne&display=swap',
                'font_name' => 'Niconne',
            ],
            [
                'id' => '19',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap',
                'font_name' => 'Original Surfer',
            ],
            [
                'id' => '20',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Gabriela&display=swap',
                'font_name' => 'Gabriela',
            ],
            [
                'id' => '21',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Yeon+Sung&display=swap',
                'font_name' => 'Yeon Sung',
            ],
            [
                'id' => '22',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Lovers+Quarrel&display=swap',
                'font_name' => 'Lovers Quarrel',
            ],
            [
                'id' => '23',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Italianno&display=swap',
                'font_name' => 'Italianno',
            ],
            [
                'id' => '24',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Ruthie&display=swap',
                'font_name' => 'Ruthie',
            ],
            [
                'id' => '25',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Lavishly+Yours&display=swap',
                'font_name' => 'Lavishly Yours',
            ],

        ];

        foreach ($fonts as $font)
        {
            Font::create($font);
        }
    }
}
