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
                        'label' => 'Sisa Lama',
                        'data' => $sisa_lama,
                    ],
                    [
                        'label' => 'Perkara Masuk',
                        'data' => $perkara_masuk,
                    ],
                    [
                        'label' => 'Perkara Putus',
                        'data' => $perkara_putus,
                    ],
                    [
                        'label' => 'Sisa Baru',
                        'data' => $sisa_baru,
                    ],
                    [
                        'label' => 'Rasio',
                        'data' => $rasio,
                    ],
                    [
                        'label' => 'E-court',
                        'data' => $e_court,
                    ],
                    [
                        'label' => 'BHT',
                        'data' => $bht,
                    ],
                ],
            ],
        ];
        $qc->setConfig(json_encode($config));
        $chartUrl = $qc->getUrl();

        return view('stastistik_perkara', compact('labels', 'sisa_lama', 'perkara_masuk', 'perkara_putus', 'sisa_baru', 'rasio', 'e_court', 'bht', 'chartUrl'));
    }
}
