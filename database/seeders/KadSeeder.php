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
                'slug' => 'N002',
                'order_id' => 'N002',
                'is_paid' => true,
                'user_id' => 1,
                'design_id' => 2,
                'font_id' => 1,
                'package_id' => 3,
                
                // Maklumat Pengantin
                'nama_penuh_lelaki' => 'Syed Azlan Izzuddin Shah Bin Syed Shaharom',
                'nama_penuh_perempuan' => 'Nurul Nazatul Najwa Binti Mior Rahim',
                'nama_panggilan_lelaki' => 'Azlan',
                'nama_panggilan_perempuan' => 'Najwa',
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
                'alamat_majlis' => '1241 E Blok Bunga Matahari, Jalan Kastam, Kampung Kastam, 42000 Pelabuhan Klang, Selangor Darul Ehsan',
                'google_url' => 'google.com',
                'waze_url' => 'waze.com',

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
