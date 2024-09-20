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
            'Gaji_dan_Tunjangan' => 69, // Updated column name
            'Operasional' => 30,
            'GajiPagu' => 2856036000,
            'GajiRealisasi' => 1839938838,
            'OperasionalPagu' => 1275909000,
            'OperasionalRealisasi' => 801901838,
            'Keperluan_sehari_hari_Pagu' => 499783000,
            'Keperluan_sehari_hari_Realisasi' => 296936688,
            'Langganan_daya_dan_jasa_Pagu' => 189000000,
            'Langganan_daya_dan_jasa_Realisasi' => 130277080,
            'Pemeliharaan_kantor_Pagu' => 411476000,
            'Pemeliharaan_kantor_Realisasi' => 259580186,
            'Pembayaran_Lainnya_Pagu' => 62630000,
            'Pembayaran_Lainnya_Realisasi' => 36686000,
            'Bantuan_sewa_rumah_dinas_hakim_Pagu' => 42120000,
            'Bantuan_sewa_rumah_dinas_hakim_Realisasi' => 31590000,
            'Perjalanan_dinas_Pagu' => 70900000,
            'Perjalanan_dinas_Realisasi' => 44075013,
        ]);
    }
}
