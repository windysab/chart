<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QuickChart;

class ChartController extends Controller
{
    public function showChart()
    {
        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2.9.4',
        ));

        $config = <<<EOD
{
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [
            { label: 'Dogs', data: [50, 60, 70, 180, 190] },
            { label: 'Cats', data: [100, 200, 300, 400, 500] },
        ],
    },
}
EOD;

        $qc->setConfig($config);

        // Get the chart URL
        $chartUrl = $qc->getUrl();

        return view('chart', compact('chartUrl'));
    }
}
