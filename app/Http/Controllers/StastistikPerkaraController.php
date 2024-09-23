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

        $config = [
            'type' => 'line',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [

                        'data' => $sisa_lama,
                        'fill' => false,
                        'borderColor' => 'rgb(75, 192, 192)',
                    ],
                    [

                        'data' => $perkara_masuk,
                        'fill' => false,
                        'borderColor' => 'rgb(255, 99, 132)',
                    ],
                    [

                        'data' => $perkara_putus,
                        'fill' => false,
                        'borderColor' => 'rgb(54, 162, 235)',
                    ],
                    [

                        'data' => $sisa_baru,
                        'fill' => false,
                        'borderColor' => 'rgb(255, 205, 86)',
                    ],

                ],
            ],
        ];
        $qc->setConfig(json_encode($config));
        $chartUrl = $qc->getUrl();

        return view('stastistik_perkara', compact('labels', 'sisa_lama', 'perkara_masuk', 'perkara_putus', 'sisa_baru', 'rasio', 'e_court', 'bht', 'chartUrl'));
    }
}
