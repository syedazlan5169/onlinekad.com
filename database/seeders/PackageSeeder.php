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
                'name' => 'Ratna',
                'description' => 'Package 1',
                'price' => 00,
            ],
            [
                'name' => 'Kirana',
                'description' => 'Package 2',
                'price' => 49,
            ],
            [
                'name' => 'Juwita',
                'description' => 'Package 3',
                'price' => 69,
            ],
        ];

        foreach ($packages as $package)
        {
            Package::create($package);
        }
    }
}
