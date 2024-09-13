<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QuickChart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showChart()
    {
        // Ambil data dari database
        $chartData = DB::table('chart_data')->get();

        // Siapkan data untuk chart
        $labels = $chartData->pluck('label')->toArray();
        $paguData = $chartData->pluck('pagu')->toArray();
        $realisasiData = $chartData->pluck('realisasi')->toArray();

        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2.9.4',
        ));

        $config = [
            'type' => 'bar',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Pagu',
                        'data' => $paguData,
                        'backgroundColor' => '#4caf50', // Warna hijau solid
                        'borderColor' => '#4caf50', // Warna hijau solid
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Realisasi',
                        'data' => $realisasiData,
                        'backgroundColor' => '#f44336', // Warna merah solid
                        'borderColor' => '#f44336', // Warna merah solid
                        'borderWidth' => 1
                    ]
                ],
            ],
        ];

        $qc->setConfig(json_encode($config));

        // Get the chart URL
        $chartUrl = $qc->getUrl();

        return view('chart', compact('chartUrl'));
    }
}
 