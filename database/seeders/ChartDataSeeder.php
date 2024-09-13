<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChartDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('chart_data')->insert([
            ['label' => 'Pos Bantuan Hukum', 'pagu' => 40000000, 'realisasi' => 23333331],
            ['label' => 'Prodeo', 'pagu' => 357500000, 'realisasi' => 357500000],
            ['label' => 'Sidang Keliling', 'pagu' => 58200000, 'realisasi' => 58200000],
            ['label' => 'Sidang Terpadu', 'pagu' => 8500000, 'realisasi' => 8500000],
        ]);
    }
}
