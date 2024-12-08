<?php

namespace Database\Seeders;

use App\Models\Kad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kads = [
            [
                // Maklumat Kad
                'id' => '1',
                'slug' => 'Deluxe',
                'order_id' => 'Deluxe',
                'is_paid' => true,
                'user_id' => 1,
                'design_id' => 1,
                'font_id' => 1,
                'package_id' => 3,
                'bg_song_id' => 2,
                'dua_pasangan_is_on' => 1,
                'rsvp_is_on' => 1,
                'guestbook_is_on' => 1,
                'slideshow_is_on' => 1,
                
                // Maklumat Pengantin
                'nama_penuh_lelaki' => 'Syed Azlan Izzuddin Shah Bin Syed Shaharom',
                'nama_penuh_perempuan' => 'Nurul Nazatul Najwa Binti Mior Rahim',
                'nama_penuh_pasangan_pertama' => 'Muhammad Adam & Nurul Hawa',
                'nama_penuh_pasangan_kedua' => 'Syed Yusuf & Sharifah Zulaikha',
                'nama_panggilan_lelaki' => 'Azlan',
                'nama_panggilan_perempuan' => 'Najwa',
                'nama_panggilan_pasangan_pertama' => 'Adam & Hawa',
                'nama_panggilan_pasangan_kedua' => 'Yusuf & Zulaikha',
                'penjemput' => 4,
                'nama_bapa_pengantin' => 'Syed Azlan Bin Syed Shaharom',
                'nama_Ibu_pengantin' => 'Nurul Nazatul Najwa Binti Mior Rahim',
                'nama_bapa_pengantin_lelaki' => 'Syed Shaharom Bin Syed Bahari',
                'nama_ibu_pengantin_lelaki' => 'Zubaidah Binti Hamdan',
                'nama_bapa_pengantin_perempuan' => 'Mior Rahim Bin Rahman',
                'nama_ibu_pengantin_perempuan' => 'Zaleha Binti Hashim',

                // Maklumat Majlis
                'tajuk_kad' => 'Walimatulurus',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\' / DATIN / TUAN / PUAN / ENCIK / CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
                'tarikh_majlis' => '2025-05-02',
                'masa_mula_majlis' => '10:00:00',
                'masa_tamat_majlis' => '17:00:00',
                'alamat_majlis' => 'Grand Ammara Wedding Halls, Jalan Jubli Perak 22/1, Seksyen 22, Batu Tiga, 40300 Shah Alam, Selangor',
                'google_url' => 'https://maps.app.goo.gl/yXRh9f8Wt8EY4zEw7',
                'waze_url' => 'https://ul.waze.com/ul?place=ChIJZy9lrBdNzDERuYVOzxlhxVg&ll=3.06830720%2C101.55558340&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',

                // JSON columns
                'nombor_telefon' => [
                    ['nama' => 'Azlan', 'nombor_telefon' => '0124249292'],
                    ['nama' => 'Najwa', 'nombor_telefon' => '0175182929'], 
                ],
                'aturcara_majlis' => [
                    ['masa_acara' => '10:00', 'acara' => 'Majlis Bermula'],
                    ['masa_acara' => '12:30', 'acara' => 'Ketibaan Pengantin'],
                    ['masa_acara' => '17:00', 'acara' => 'Majlis Bersurai'],
                ],

                // Optional fields
                'doa_pengantin' => '“Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini, Kurniakanlah mereka zuriat yang soleh dan solehah. Kekalkan jodoh mereka di dunia dan di akhirat dan sempurnakanlah agama mereka dengan berkat ikatan ini.”',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\'/ DATIN/ TUAN/ PUAN/ ENCIK/ CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
            ],
            [
                // Maklumat Kad
                'id' => '2',
                'slug' => 'Premium',
                'order_id' => 'Premium',
                'is_paid' => true,
                'user_id' => 1,
                'design_id' => 2,
                'font_id' => 1,
                'package_id' => 2,
                'bg_song_id' => 2,
                'dua_pasangan_is_on' => 0,
                'rsvp_is_on' => 1,
                'guestbook_is_on' => 1,
                'slideshow_is_on' => 1,
                
                // Maklumat Pengantin
                'nama_penuh_lelaki' => 'Syed Azlan Izzuddin Shah Bin Syed Shaharom',
                'nama_penuh_perempuan' => 'Nurul Nazatul Najwa Binti Mior Rahim',
                'nama_panggilan_lelaki' => 'Azlan',
                'nama_panggilan_perempuan' => 'Najwa',
                'penjemput' => 1,
                'nama_bapa_pengantin_lelaki' => 'Syed Shaharom Bin Syed Bahari',
                'nama_ibu_pengantin_lelaki' => 'Zubaidah Binti Hamdan',
                'nama_bapa_pengantin_perempuan' => 'Mior Rahim Bin Rahman',
                'nama_ibu_pengantin_perempuan' => 'Zaleha Binti Hashim',

                // Maklumat Majlis
                'tajuk_kad' => 'Walimatulurus',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\' / DATIN / TUAN / PUAN / ENCIK / CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
                'tarikh_majlis' => '2025-05-02',
                'masa_mula_majlis' => '10:00:00',
                'masa_tamat_majlis' => '17:00:00',
                'alamat_majlis' => 'Grand Ammara Wedding Halls, Jalan Jubli Perak 22/1, Seksyen 22, Batu Tiga, 40300 Shah Alam, Selangor',
                'google_url' => 'https://maps.app.goo.gl/yXRh9f8Wt8EY4zEw7',
                'waze_url' => 'https://ul.waze.com/ul?place=ChIJZy9lrBdNzDERuYVOzxlhxVg&ll=3.06830720%2C101.55558340&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',

                // JSON columns
                'nombor_telefon' => [
                    ['nama' => 'Azlan', 'nombor_telefon' => '0124249292'],
                    ['nama' => 'Najwa', 'nombor_telefon' => '0175182929'], 
                ],
                'aturcara_majlis' => [
                    ['masa_acara' => '10:00', 'acara' => 'Majlis Bermula'],
                    ['masa_acara' => '12:30', 'acara' => 'Ketibaan Pengantin'],
                    ['masa_acara' => '17:00', 'acara' => 'Majlis Bersurai'],
                ],

                // Optional fields
                'doa_pengantin' => '“Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini, Kurniakanlah mereka zuriat yang soleh dan solehah. Kekalkan jodoh mereka di dunia dan di akhirat dan sempurnakanlah agama mereka dengan berkat ikatan ini.”',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\'/ DATIN/ TUAN/ PUAN/ ENCIK/ CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
            ],
            [
                // Maklumat Kad
                'id' => '3',
                'slug' => 'Basic',
                'order_id' => 'Basic',
                'is_paid' => true,
                'user_id' => 1,
                'design_id' => 3,
                'font_id' => 1,
                'package_id' => 1,
                'bg_song_id' => 1,
                'dua_pasangan_is_on' => 0,
                
                // Maklumat Pengantin
                'nama_penuh_lelaki' => 'Syed Azlan Izzuddin Shah Bin Syed Shaharom',
                'nama_penuh_perempuan' => 'Nurul Nazatul Najwa Binti Mior Rahim',
                'nama_panggilan_lelaki' => 'Azlan',
                'nama_panggilan_perempuan' => 'Najwa',
                'penjemput' => 2,
                'nama_bapa_pengantin_lelaki' => 'Syed Shaharom Bin Syed Bahari',
                'nama_ibu_pengantin_lelaki' => 'Zubaidah Binti Hamdan',
                'nama_bapa_pengantin_perempuan' => 'Mior Rahim Bin Rahman',
                'nama_ibu_pengantin_perempuan' => 'Zaleha Binti Hashim',

                // Maklumat Majlis
                'tajuk_kad' => 'Walimatulurus',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\' / DATIN / TUAN / PUAN / ENCIK / CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
                'tarikh_majlis' => '2025-05-02',
                'masa_mula_majlis' => '10:00:00',
                'masa_tamat_majlis' => '17:00:00',
                'alamat_majlis' => 'Grand Ammara Wedding Halls, Jalan Jubli Perak 22/1, Seksyen 22, Batu Tiga, 40300 Shah Alam, Selangor',
                'google_url' => 'https://maps.app.goo.gl/yXRh9f8Wt8EY4zEw7',
                'waze_url' => 'https://ul.waze.com/ul?place=ChIJZy9lrBdNzDERuYVOzxlhxVg&ll=3.06830720%2C101.55558340&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',

                // JSON columns
                'nombor_telefon' => [
                    ['nama' => 'Azlan', 'nombor_telefon' => '0124249292'],
                    ['nama' => 'Najwa', 'nombor_telefon' => '0175182929'], 
                ],
                'aturcara_majlis' => [
                    ['masa_acara' => '10:00', 'acara' => 'Majlis Bermula'],
                    ['masa_acara' => '12:30', 'acara' => 'Ketibaan Pengantin'],
                    ['masa_acara' => '17:00', 'acara' => 'Majlis Bersurai'],
                ],

                // Optional fields
                'doa_pengantin' => '“Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini, Kurniakanlah mereka zuriat yang soleh dan solehah. Kekalkan jodoh mereka di dunia dan di akhirat dan sempurnakanlah agama mereka dengan berkat ikatan ini.”',
                'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\'/ DATIN/ TUAN/ PUAN/ ENCIK/ CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
            ],
           
            // Add more entries as needed
        ];

        foreach ($kads as $kad) {
            Kad::create($kad);
        }
    }
}
