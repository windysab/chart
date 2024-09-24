<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StastistikPerkara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StastistikPerkaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // ['Gugatan Perdata', 59, 61, 62, 58, 67.2, 101.6, 62],
            // ['Permohonan', 9, 24, 17, 16, 8.3, 70.8, 31],
            [
                'nama_perkara' => 'Gugatan',
                'sisa_lama' => 59,
                'perkara_masuk' => 61,
                'perkara_putus' => 62,
                'sisa_baru' => 58,
                'rasio' => 67.2,
                'E-court' => 101.6,
                'BHT' => 62
            ],
            [
                'nama_perkara' => 'Permohonan',
                'sisa_lama' => 9,
                'perkara_masuk' => 24,
                'perkara_putus' => 17,
                'sisa_baru' => 16,
                'rasio' => 8.3,
                'E-court' => 70.8,
                'BHT' => 31
            ]

        ];

        foreach ($data as $item) {
            StastistikPerkara::create($item);
        }
    }
}
