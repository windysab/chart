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

        $data = $decodedData['datasets'][0]['data']; // Ambil semua nilai dari data

        // Log the data to ensure it's correct
        // Log::info('Data:', $data);

        $qc = new QuickChart(array(
            'width' => 800,
            'height' => 400,
            'version' => '2.9.4',
        ));

        // Gunakan data dari database dalam konfigurasi chart
        $config = [
            'type' => 'bar',
            'data' => [
                'labels' => ['Pagu', 'Realisasi'],
                'datasets' => [
                    [
                        'label' => 'Realisasi',
                        'data' => [$realisasiData->pagu, $realisasiData->realisasi],
                        'backgroundColor' => ['#ff0000', '#326df5'], // Red for Pagu, Blue for Realisasi
                    ]
                ]
            ],
            'options' => [
                'scales' => [
                    'yAxes' => [[
                        'ticks' => [
                            'beginAtZero' => true
                        ]
                    ]]
                ]
            ]
        ];

        $qc->setConfig(json_encode($config));

        // Get the chart URL
        $chartUrl = $qc->getUrl();

        return view('realisasi', compact('chartUrl', 'data'));
    }
}
