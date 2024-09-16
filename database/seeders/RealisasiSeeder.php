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
                            'data' => [75]
                        ]
                    ]
                ]), // Corrected value to JSON format
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
