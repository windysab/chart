<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;
use QuickChart;

class RealisasiController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel realisasi
        $realisasiData = Realisasi::first();

        // Pastikan data diambil dalam format yang benar
        $decodedData = json_decode($realisasiData->data, true);

        // Tambahkan pengecekan apakah json_decode berhasil
        if (json_last_error() !== JSON_ERROR_NONE || !isset($decodedData['datasets'][0]['data'])) {
            return response()->json(['error' => 'Data tidak valid'], 400);
        }

        $data = $decodedData['datasets'][0]['data'][0]; // Ambil nilai pertama dari data

        $qc = new QuickChart(array(
            'width' => 800,
            'height' => 400,
            'version' => '2.9.4',
        ));

        $config = <<<EOD
{
  type: 'bar',
  data: {
    labels: ['Pos Bantuan Hukum', 'Prodeo', 'Sidang Keliling', 'Sidang Terpadu'],
    datasets: [{
      label: 'Realisasi',
      data: [23333331, 357500000, 58200000, 8500000]
    }]
  }
}
EOD;

        $qc->setConfig($config);

        // Get the chart URL
        $chartUrl = $qc->getUrl();

        // Get the image binary data
        $image = $qc->toBinary();

        // Save the image to a file
        $qc->toFile(public_path('chart.png'));

        return view('realisasi', compact('chartUrl', 'data'));
    }
}
