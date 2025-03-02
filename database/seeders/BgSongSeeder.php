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
                'id' => 1,
                'song_url' => '#',
                'song_name' => 'Tiada Lagu',
            ],
            [
                'id' => 2,
                'song_url' => '/musics/Irama-klasik-melayu.mp3',
                'song_name' => 'Irama Klasik Melayu',
            ],
            [
                'id' => 3,
                'song_url' => '/musics/a-thousand-years.mp3',
                'song_name' => 'A Thousand Years ( Instrumental )',
            ],
            [
                'id' => 4,
                'song_url' => '/musics/perfect.mp3',
                'song_name' => 'Perfect ( Violin )',
            ],
            [
                'id' => 5,
                'song_url' => '/musics/sempurna.mp3',
                'song_name' => 'Sempurna ( Guitar )',
            ],
            [
                'id' => 6,
                'song_url' => '/musics/bunga-rampai.mp3',
                'song_name' => 'Bunga Rampai ( Instrumental )',
            ],
            [
                'id' => 7,
                'song_url' => '/musics/sekapur-sirih.mp3',
                'song_name' => 'Sekapur Sirih ( Instrumental )',
            ],
            [
                'id' => 8,
                'song_url' => '/musics/di-renjis-renjis.mp3',
                'song_name' => 'Di Renjis-renjis ( Instrumental )',
            ],
            [
                'id' => 9,
                'song_url' => '/musics/menghitung-hari.mp3',
                'song_name' => 'Menghitung Hari ( Piano )',
            ],
            [
                'id' => 10,
                'song_url' => '/musics/cant-help-falling-in-love.mp3',
                'song_name' => 'Can\'t Help Falling in Love ( Piano )',
            ],
            [
                'id' => 11,
                'song_url' => '/musics/beautiful-in-white.mp3',
                'song_name' => 'Beautiful In White',
            ],
            [
                'id' => 12,
                'song_url' => '/musics/satu-shaf-di-belakangku.mp3',
                'song_name' => 'Satu Shaf di Belakangku',
            ],
            [
                'id' => 13,
                'song_url' => '/musics/sudah-diinai-inaikan.mp3',
                'song_name' => 'Sudah Diinai-inaikan',
            ],
            [
                'id' => 14,
                'song_url' => '/musics/umpan-jinak-di-air-tenang.mp3',
                'song_name' => 'Umpan Jinak Di Air Tenang',
            ],
            [
                'id' => 15,
                'song_url' => '/musics/i-choose-you.mp3',
                'song_name' => 'I Choose You',
            ],
            [
                'id' => 16,
                'song_url' => '/musics/kompang-dipalu.mp3',
                'song_name' => 'Kompang Dipalu',
            ],
            [
                'id' => 17,
                'song_url' => '/musics/love-story.mp3',
                'song_name' => 'Love Story (Piano)',
            ],
            [
                'id' => 18,
                'song_url' => '/musics/mariage-d-amour.mp3',
                'song_name' => 'Mariage d\'Amour',
            ],
            [
                'id' => 19,
                'song_url' => '/musics/take-my-hand.mp3',
                'song_name' => 'Take My Hand',
            ],
            [
                'id' => 20,
                'song_url' => '/musics/you-are-the-reason.mp3',
                'song_name' => 'You Are The Reason (Piano)',
            ],
            [
                'id' => 21,
                'song_url' => '/musics/barakallah.mp3',
                'song_name' => 'Barakallah',
            ],

        ];

        foreach ($songs as $song)
        {
            BgSong::create($song);
        }
    }
}
