<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'brand' => 'Samsung'
            ],
            [
                'brand' => 'Realme'
            ],
            [
                'brand' => 'Oppo'
            ],
        ];

        foreach ($brands as $value) {
            Brand::create($value);
        }

    }
}