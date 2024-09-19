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
            'GajiPagu' => 2856036000,
            'GajiRealisasi' => 1839938838,
            'OperasionalPagu' => 1275909000,
            'OperasionalRealisasi' => 801901838,
        ]);
    }
}

