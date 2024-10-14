<?php

namespace Database\Seeders;

use App\Models\BgSong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BgSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            [
                'song_url' => '#',
                'song_name' => 'Tiada Lagu',
            ],
            [
                'song_url' => '/musics/Irama-klasik-melayu.mp3',
                'song_name' => 'Irama Klasik Melayu',
            ],
            [
                'song_url' => '/musics/a-thousand-years.mp3',
                'song_name' => 'A Thousand Years ( Instrumental )',
            ],
        ];

        foreach ($songs as $song)
        {
            BgSong::create($song);
        }
    }
}
