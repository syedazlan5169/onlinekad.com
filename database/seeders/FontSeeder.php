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
                'font_url' => 'https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&display=swap',
                'font_name' => 'Qwitcher Grypen',
            ],
            [
                'id' => '6',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Montez&display=swap',
                'font_name' => 'Montez',
            ],
            [
                'id' => '7',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Updock&display=swap',
                'font_name' => 'Updock',
            ],
            [
                'id' => '8',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Satisfy&display=swap',
                'font_name' => 'Satisfy',
            ],
            [
                'id' => '9',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Sacramento&display=swap',
                'font_name' => 'Sacramento',
            ],
            [
                'id' => '10',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Allura&display=swap',
                'font_name' => 'Allura',
            ],
            [
                'id' => '11',
                'font_url' => 'https://fonts.googleapis.com/css2?family=Qwigley&display=swap',
                'font_name' => 'Qwigley',
            ],
        ];

        foreach ($fonts as $font)
        {
            Font::create($font);
        }
    }
}
