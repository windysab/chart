<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StastistikPerkara;
use QuickChart;

class StastistikPerkaraController extends Controller
{
    public function index()
    {
        $data = StastistikPerkara::all();

        $labels = $data->pluck('jenis_perkara')->toArray();
        $sisa_lama = $data->pluck('sisa_lama')->toArray();
        $perkara_masuk = $data->pluck('perkara_masuk')->toArray();
        $perkara_putus = $data->pluck('perkara_putus')->toArray();
        $sisa_baru = $data->pluck('sisa_baru')->toArray();
        $rasio = $data->pluck('rasio')->toArray();
        $e_court = $data->pluck('e_court')->toArray();
        $bht = $data->pluck('bht')->toArray();

        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2.9.4',
        ));

        $qc->setConfig([
            'type' => 'bar',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Sisa Lama',
                        'data' => $sisa_lama,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Perkara Masuk',
                        'data' => $perkara_masuk,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgb(54, 162, 235)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Perkara Putus',
                        'data' => $perkara_putus,
                        'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                        'borderColor' => 'rgb(255, 206, 86)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Sisa Baru',
                        'data' => $sisa_baru,
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgb(75, 192, 192)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Rasio',
                        'data' => $rasio,
                        'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                        'borderColor' => 'rgb(153, 102, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'E-court',
                        'data' => $e_court,
                        'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                        'borderColor' => 'rgb(255, 159, 64)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'BHT',
                        'data' => $bht,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'borderWidth' => 1
                    ],
                ],
            ],
            'options' => [
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        $chartUrl = $qc->getUrl();

        return view('stastistik_perkara', compact('labels', 'sisa_lama', 'perkara_masuk', 'perkara_putus', 'sisa_baru', 'rasio', 'e_court', 'bht', 'chartUrl'));
    }
}
