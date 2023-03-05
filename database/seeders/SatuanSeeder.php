<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = [
            [
                'satuan' => 'Unit'
            ],
            [
                'satuan' => 'Sekotak'
            ],
            [
                'satuan' => 'Sebuah'
            ],
        ];

        foreach ($satuan as $value) {
            Satuan::create($value);
        }

    }
}