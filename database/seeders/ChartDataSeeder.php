<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChartDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('chart_data')->insert([
            ['label' => 'Pos Bantuan Hukum', 'pagu' => 40000000, 'realisasi' => 23333331, 'P' => 400, 'R' => 496],
            ['label' => 'Prodeo', 'pagu' => 357500000, 'realisasi' => 357500000, 'P' => 65, 'R' => 106],
            ['label' => 'Sidang Keliling', 'pagu' => 58200000, 'realisasi' => 58200000, 'P' => 60, 'R' => 103],
            ['label' => 'Sidang Terpadu', 'pagu' => 8500000, 'realisasi' => 8500000, 'P' => 10, 'R' => 23],
        ]);
    }
}
