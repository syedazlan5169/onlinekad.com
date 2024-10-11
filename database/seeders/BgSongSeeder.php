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
                'song_url' => '/musics/Irama-klasik-melayu.mp3',
                'song_name' => 'Irama Klasik Melayu',
            ],
            [
                'song_url' => '/musics/Irama-klasik-melayu.mp3',
                'song_name' => 'One Thousand Dream',
            ],
        ];

        foreach ($songs as $song)
        {
            BgSong::create($song);
        }
    }
}
