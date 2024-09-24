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
        $sisa_lama = $data->pluck('sisa_lama')->toArray();
        $perkara_masuk = $data->pluck('perkara_masuk')->toArray();
        $perkara_putus = $data->pluck('perkara_putus')->toArray();
        $sisa_baru = $data->pluck('sisa_baru')->toArray();
        $gugatan = $data->pluck('gugatan')->toArray();
        $permohonan = $data->pluck('permohonan')->toArray();

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
                        'data' => $sisa_lama,
                        'fill' => true,
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgb(75, 192, 192)',
                        'tension' => 0.1,
                    ],
                    [
                        'label' => 'Permohonan',
                        'data' => $perkara_masuk,
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

        return view('stastistik_perkara', compact('chartUrl', 'sisa_lama', 'perkara_masuk', 'perkara_putus', 'sisa_baru', 'labels'));
    }
}
