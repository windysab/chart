<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerkaraSeeder extends Seeder
{
    public function run()
    {
        DB::table('perkaras')->insert([
            [
                'PERKARA' => 1,
                'E-COURT' => 1,
                'PUTUS' => 5,
                'MASUK' => 5,
                'BHT' => 6,
                'SISA_LAMA' => 7,
                'SISA_BARU' => 6,
            ],
            // Tambahkan data lainnya
        ]);
    }
}
