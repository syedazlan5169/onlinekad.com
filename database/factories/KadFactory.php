<?php

namespace Database\Factories;

use App\Models\Kad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KadFactory extends Factory
{
    protected $model = Kad::class;

    public function definition()
    {
        return [
            // Maklumat Kad
            'order_id' => 'SY' . rand(100000, 999999) . strtoupper(Str::random(5)),
            'is_paid' => $this->faker->boolean,
            'user_id' => 1,
            'design_id' => rand(1, 2),
            'font_id' => 1,
            'package_id' => 1,
            
            // Maklumat Pengantin
            'nama_penuh_lelaki' => $this->faker->name('male'),
            'nama_penuh_perempuan' => $this->faker->name('female'),
            'nama_panggilan_lelaki' => $this->faker->firstName('male'),
            'nama_panggilan_perempuan' => $this->faker->firstName('female'),
            'nama_bapa_pengantin_lelaki' => $this->faker->name('male'),
            'nama_ibu_pengantin_lelaki' => $this->faker->name('female'),
            'nama_bapa_pengantin_perempuan' => $this->faker->name('male'),
            'nama_ibu_pengantin_perempuan' => $this->faker->name('female'),

            // Maklumat Majlis
            'tajuk_kad' => $this->faker->words(3, true),
            'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\' / DATIN / TUAN / PUAN / ENCIK / CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',
            'tarikh_majlis' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'masa_mula_majlis' => $this->faker->time(),
            'masa_tamat_majlis' => $this->faker->time(),
            'alamat_majlis' => $this->faker->address,
            'google_url' => $this->faker->url,
            'waze_url' => $this->faker->url,

            // JSON columns
            'nombor_telefon' => [
                ['nama' => $this->faker->name(), 'nombor_telefon' => $this->faker->phoneNumber],
                ['nama' => $this->faker->name(), 'nombor_telefon' => $this->faker->phoneNumber]
            ],
            'aturcara_majlis' => [
                ['masa_acara' => '10:00', 'acara' => 'Majlis Bermula'],
                ['masa_acara' => '12:30', 'acara' => 'Ketibaan Pengantin'],
                ['masa_acara' => '17:00', 'acara' => 'Majlis Bersurai'],
            ],

            // Optional fields
            'doa_pengantin' => $this->faker->paragraph,
            'ayat_jemputan' => $this->faker->paragraph,
        ];
    }
}
