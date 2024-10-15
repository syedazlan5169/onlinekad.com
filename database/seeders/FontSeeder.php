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
                'font_url' => 'https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Great+Vibes&display=swap',
                'font_name' => 'Great Vibes',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap',
                'font_name' => 'Dancing Script',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap',
                'font_name' => 'Alex Brush',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Parisienne&display=swap',
                'font_name' => 'Parisienne',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&display=swap',
                'font_name' => 'Qwitcher Grypen',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Montez&display=swap',
                'font_name' => 'Montez',
            ],
            [
                'font_url' => 'https://fonts.googleapis.com/css2?family=Updock&display=swap',
                'font_name' => 'Updock',
            ],
        ];

        foreach ($fonts as $font)
        {
            Font::create($font);
        }
    }
}
