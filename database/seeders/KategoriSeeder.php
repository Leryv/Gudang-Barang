<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'kategori' => 'Handphone'
            ],
            [
                'kategori' => 'Earphone'
            ],
            [
                'kategori' => 'Laptop'
            ],
        ];

        foreach ($kategori as $value) {
            Kategori::create($value);
        }

    }
}