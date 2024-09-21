<?php

namespace App\Http\Controllers;

use App\Models\Dipa01Data;
use Illuminate\Http\Request;

class Dipa01Controller extends Controller
{
    public function showChart()
    {
        // Mengambil semua data dari model Dipa01Data
        $data = Dipa01Data::all();

        // Menghitung total gaji dan operasional
        $totalGaji = $data->sum('Gaji_dan_Tunjangan');
        $totalOperasional = $data->sum('Operasional');

        // Menghitung total pagu dan realisasi untuk gaji dan operasional
        $totalGajiPagu = $data->sum('GajiPagu');
        $totalGajiRealisasi = $data->sum('GajiRealisasi');
        $totalOperasionalPagu = $data->sum('OperasionalPagu');
        $totalOperasionalRealisasi = $data->sum('OperasionalRealisasi');

        // Menghitung progress gaji dan operasional sebagai persentase dari total
        $progressGaji = $this->calculateProgress($totalGaji, $totalGaji + $totalOperasional);
        $progressOperasional = $this->calculateProgress($totalOperasional, $totalGaji + $totalOperasional);

        // Menghitung progress gaji dan operasional dari pagu masing-masing
        $progressGajiPagu = $this->calculateProgress($totalGajiRealisasi, $totalGajiPagu);
        $progressOperasionalPagu = $this->calculateProgress($totalOperasionalRealisasi, $totalOperasionalPagu);

        // Mengambil data tambahan untuk chart
        $additionalData = $this->getAdditionalData($data);

        // Mengembalikan view dengan nilai progress yang dihitung dan data chart
        return view('dipa01', array_merge([
            'progressGaji' => $progressGaji,
            'progressOperasional' => $progressOperasional,
            'totalGajiPagu' => $totalGajiPagu,
            'totalGajiRealisasi' => $totalGajiRealisasi,
            'totalOperasionalPagu' => $totalOperasionalPagu,
            'totalOperasionalRealisasi' => $totalOperasionalRealisasi,
            'progressGajiPagu' => $progressGajiPagu,
            'progressOperasionalPagu' => $progressOperasionalPagu,
        ], $additionalData));
    }

    /**
     * Menghitung progress sebagai persentase.
     *
     * @param float $part
     * @param float $total
     * @return float
     */
    private function calculateProgress($part, $total)
    {
        return $total > 0 ? number_format(($part / $total) * 100, 1) : 0;
    }

    /**
     * Mengambil data tambahan untuk chart.
     *
     * @param \Illuminate\Support\Collection $data
     * @return array
     */
    private function getAdditionalData($data)
    {
        return [
            'totalKeperluanSehariHariPagu' => $data->sum('Keperluan_sehari_hari_Pagu'),
            'totalKeperluanSehariHariRealisasi' => $data->sum('Keperluan_sehari_hari_Realisasi'),
            'totalLanggananDayaDanJasaPagu' => $data->sum('Langganan_daya_dan_jasa_Pagu'),
            'totalLanggananDayaDanJasaRealisasi' => $data->sum('Langganan_daya_dan_jasa_Realisasi'),
            'totalPemeliharaanKantorPagu' => $data->sum('Pemeliharaan_kantor_Pagu'),
            'totalPemeliharaanKantorRealisasi' => $data->sum('Pemeliharaan_kantor_Realisasi'),
            'totalPembayaranLainnyaPagu' => $data->sum('Pembayaran_Lainnya_Pagu'),
            'totalPembayaranLainnyaRealisasi' => $data->sum('Pembayaran_Lainnya_Realisasi'),
            'totalBantuanSewaRumahDinasHakimPagu' => $data->sum('Bantuan_sewa_rumah_dinas_hakim_Pagu'),
            'totalBantuanSewaRumahDinasHakimRealisasi' => $data->sum('Bantuan_sewa_rumah_dinas_hakim_Realisasi'),
            'totalPerjalananDinasPagu' => $data->sum('Perjalanan_dinas_Pagu'),
            'totalPerjalananDinasRealisasi' => $data->sum('Perjalanan_dinas_Realisasi'),
        ];
    }
}
