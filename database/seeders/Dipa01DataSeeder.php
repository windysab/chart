<?php

namespace Database\Seeders;

use App\Models\Dipa01Data;
use Illuminate\Database\Seeder;

class Dipa01DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dipa01Data::create([
            'label' => 'September',
            'Gaji' => 69,
            'Operasional' => 30,
            'GajiPagu' => 20000,
            'GajiRealisasi' => 12000,
            'OperasionalPagu' => 30000,
            'OperasionalRealisasi' => 21000,
        ]);
    }
}

