<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Basic',
                'description' => 'Kad kahwin digital lengkap percuma!!. Boleh diedarkan serta-merta',
                'price' => 00,
            ],
            [
                'name' => 'Premium',
                'description' => 'Kaya dengan pelbagai fungsi menarik bagi memudahkan tetamu jemputan dan pihak majlis',
                'price' => 49,
            ],
            [
                'name' => 'Deluxe',
                'description' => 'Dua pasangan dalam satu majlis?? Pakej Juwita pilihan yang tepat',
                'price' => 69,
            ],
        ];

        foreach ($packages as $package)
        {
            Package::create($package);
        }
    }
}
