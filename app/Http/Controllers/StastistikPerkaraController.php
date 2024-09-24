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

        $labels = ['Sisa Lama', 'Perkara Masuk', 'Perkara Putus', 'Sisa Baru'];

        // Filter data for 'Gugatan' and 'Permohonan'
        $gugatan = $data->where('nama_perkara', 'Gugatan')->first();
        $permohonan = $data->where('nama_perkara', 'Permohonan')->first();

        $gugatanData = [
            $gugatan->sisa_lama,
            $gugatan->perkara_masuk,
            $gugatan->perkara_putus,
            $gugatan->sisa_baru,
        ];

        $permohonanData = [
            $permohonan->sisa_lama,
            $permohonan->perkara_masuk,
            $permohonan->perkara_putus,
            $permohonan->sisa_baru,
        ];

        $qc = new QuickChart(array(
            'width' => 800,
            'height' => 400,
            'version' => '2.9.4',
        ));

        $config = [
            'type' => 'line',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Gugatan',
                        'data' => $gugatanData,
                        'fill' => true,
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgb(75, 192, 192)',
                        'tension' => 0.1,
                    ],
                    [
                        'label' => 'Permohonan',
                        'data' => $permohonanData,
                        'fill' => true,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'tension' => 0.1,
                    ],
                ],
            ],
            'options' => [
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Stastistik Perkara',
                    ],
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
        ];

        $qc->setConfig(json_encode($config));
        $chartUrl = $qc->getUrl();

        // Pass the necessary variables to the view
        return view('stastistik_perkara', [
            'chartUrl' => $chartUrl,
            'labels' => $labels,
            'perkara' => ['Gugatan', 'Permohonan'],
            'sisa_lama' => [$gugatan->sisa_lama, $permohonan->sisa_lama],
            'perkara_masuk' => [$gugatan->perkara_masuk, $permohonan->perkara_masuk],
            'perkara_putus' => [$gugatan->perkara_putus, $permohonan->perkara_putus],
            'sisa_baru' => [$gugatan->sisa_baru, $permohonan->sisa_baru],
        ]);
    }
}
