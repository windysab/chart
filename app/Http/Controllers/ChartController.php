<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkara;
use QuickChart;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function lineChart()
    {
        // Mengambil data dari database
        $table = Perkara::all()->toArray();
        $labels = ['SISA_LAMA', 'MASUK', 'PUTUS', 'SISA_BARU'];

        // Memeriksa apakah tabel memiliki setidaknya dua baris
        if (count($table) < 2) {
            return response()->json(['error' => 'Insufficient data in database'], 400);
        }

        // Memeriksa apakah kolom yang diperlukan ada di dalam data
        $requiredColumns = array_merge(['PERKARA', 'E-COURT', 'PUTUS', 'MASUK', 'BHT'], $labels);
        foreach ($requiredColumns as $column) {
            if (!array_key_exists($column, $table[0])) {
                return response()->json(['error' => "Missing required column: $column"], 400);
            }
        }

        $datasets = [];
        foreach ($table as $row) {
            $perkara = $row['PERKARA'];
            $data = array_values(array_intersect_key($row, array_flip($labels)));
            $borderColor = $perkara == 'Gugatan' ? 'red' : ($perkara == 'Permohonan' ? 'green' : $this->generateColors(1)[0]);
            $datasets[] = [
                "label" => $perkara,
                "data" => $data,
                "fill" => false,
                "borderColor" => $borderColor
            ];
        }

        $chartConfig = [
            "type" => "line",
            "data" => [
                "labels" => $labels,
                "datasets" => $datasets
            ],
            "options" => [
                "onClick" => "function(event, array) { if(array.length > 0) { alert(array[0].element.raw); } }"
            ]
        ];

        // Mengambil data E-Court dari database
        $eCourtGugatan = isset($table[0]['E-COURT']) ? floatval(rtrim($table[0]['E-COURT'], '%')) : 0;
        $eCourtPermohonan = isset($table[1]['E-COURT']) ? floatval(rtrim($table[1]['E-COURT'], '%')) : 0;

        // Membuat grafik progress bar untuk Gugatan
        $qcGugatan = new QuickChart();
        $qcGugatan->setWidth(300);
        $qcGugatan->setHeight(50);
        $qcGugatan->setVersion('2.9.4');
        $qcGugatan->setConfig([
            "type" => "progressBar",
            "data" => [
                "datasets" => [
                    [
                        "data" => [$eCourtGugatan],
                        "backgroundColor" => "rgba(204, 33, 33, 0.8)"
                    ],
                ],
            ],
        ]);
        $progressBarUrlGugatan = $qcGugatan->getUrl();

        // Membuat grafik progress bar untuk Permohonan
        $qcPermohonan = new QuickChart();
        $qcPermohonan->setWidth(300);
        $qcPermohonan->setHeight(50);
        $qcPermohonan->setVersion('2.9.4');
        $qcPermohonan->setConfig([
            "type" => "progressBar",
            "data" => [
                "datasets" => [
                    [
                        "data" => [$eCourtPermohonan],
                        "backgroundColor" => "rgba(45, 160, 45, 0.8)"
                    ],
                ],
            ],
        ]);
        $progressBarUrlPermohonan = $qcPermohonan->getUrl();

        // Menghitung rasio dan membuat grafik radial gauge untuk Gugatan
        $rasioGugatan = isset($table[0]['PUTUS']) && isset($table[0]['MASUK']) ? floatval($table[0]['PUTUS']) / floatval($table[0]['MASUK']) * 100 : 0;

        $qcRadialGugatan = new QuickChart();
        $qcRadialGugatan->setWidth(300);
        $qcRadialGugatan->setHeight(100);
        $qcRadialGugatan->setVersion('2.9.4');
        $qcRadialGugatan->setConfig([
            "type" => "radialGauge",
            "data" => [
                "datasets" => [
                    [
                        "data" => [$rasioGugatan],
                        "backgroundColor" => "red"
                    ]
                ]
            ]
        ]);
        $radialChartUrlGugatan = $qcRadialGugatan->getUrl();

        // Menghitung rasio dan membuat grafik radial gauge untuk Permohonan
        $rasioPermohonan = isset($table[1]['PUTUS']) && isset($table[1]['MASUK']) ? floatval($table[1]['PUTUS']) / floatval($table[1]['MASUK']) * 100 : 0;
        $qcRadialPermohonan = new QuickChart();
        $qcRadialPermohonan->setWidth(300);
        $qcRadialPermohonan->setHeight(100);
        $qcRadialPermohonan->setVersion('2.9.4');
        $qcRadialPermohonan->setConfig([
            "type" => "radialGauge",
            "data" => [
                "datasets" => [
                    [
                        "data" => [$rasioPermohonan],
                        "backgroundColor" => "green"
                    ]
                ]
            ]
        ]);
        $radialChartUrlPermohonan = $qcRadialPermohonan->getUrl();

        // Mendapatkan nama bulan saat ini
        $currentMonth = date('F');

        $bhtG = isset($table[0]['BHT']) ? $table[0]['BHT'] : 0;
        $bhtP = isset($table[1]['BHT']) ? $table[1]['BHT'] : 0;

        return view('line_chart', [
            'chartConfig' => $chartConfig,
            'currentMonth' => $currentMonth,
            'progressBarUrlGugatan' => $progressBarUrlGugatan,
            'progressBarUrlPermohonan' => $progressBarUrlPermohonan,
            'radialChartUrlGugatan' => $radialChartUrlGugatan,
            'radialChartUrlPermohonan' => $radialChartUrlPermohonan,
            'eCourtGugatan' => $eCourtGugatan,
            'eCourtPermohonan' => $eCourtPermohonan,
            'bhtG' => $bhtG,
            'bhtP' => $bhtP
        ]);
    }

    private function generateColors($count)
    {
        $colors = [];
        for ($i = 0; $i < $count; $i++) {
            $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
        return $colors;
    }
}
