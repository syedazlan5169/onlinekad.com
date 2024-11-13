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
            [
                'song_url' => '/musics/perfect.mp3',
                'song_name' => 'Perfect ( Violin )',
            ],
            [
                'song_url' => '/musics/sempurna.mp3',
                'song_name' => 'Sempurna ( Guitar )',
            ],
            [
                'song_url' => '/musics/bunga-rampai.mp3',
                'song_name' => 'Bunga Rampai ( Instrumental )',
            ],
            [
                'song_url' => '/musics/sekapur-sirih.mp3',
                'song_name' => 'Sekapur Sirih ( Instrumental )',
            ],
            [
                'song_url' => '/musics/di-renjis-renjis.mp3',
                'song_name' => 'Di Renjis-renjis ( Instrumental )',
            ],
            [
                'song_url' => '/musics/menghitung-hari.mp3',
                'song_name' => 'Menghitung Hari ( Piano )',
            ],
            [
                'song_url' => '/musics/cant-help-falling-in-love.mp3',
                'song_name' => 'Can\'t Help Falling in Love ( Piano )',
            ],
        ];

        foreach ($songs as $song)
        {
            BgSong::create($song);
        }
    }
}
