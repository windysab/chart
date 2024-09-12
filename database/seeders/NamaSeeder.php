<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerkaraSeeder extends Seeder
{
    public function run()
    {
        DB::table('perkara')->insert([
            [
                'PERKARA' => 'Perkara 1',
                'E-COURT' => 'E-Court 1',
                'PUTUS' => '2023-01-01',
                'MASUK' => '2023-01-01',
                'BHT' => '2023-01-01',
                'SISA_LAMA' => 0,
                'SISA_BARU' => 0,
            ],
            // Tambahkan data lainnya
        ]);
    }
}
