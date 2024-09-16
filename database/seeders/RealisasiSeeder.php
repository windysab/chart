<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('realisasi')->insert([
            [
                'type' => 'progressBar',
                'data' => json_encode([
                    'datasets' => [
                        [
                            'data' => [88,2]
                        ]
                    ]
                ]), // Corrected value to JSON format
                'pagu' => 100000000,
                'realisasi' => 88000000,
                'P' => 88,
                'R' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
