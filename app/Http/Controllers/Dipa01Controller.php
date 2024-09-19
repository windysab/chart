<?php

namespace App\Http\Controllers;

use App\Models\Dipa01Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use QuickChart;

class Dipa01Controller extends Controller
{
    public function showChart()
    {
        // Fetch all data from the Dipa01Data model
        $data = Dipa01Data::all();
        Log::info('Dipa01 Data:', ['data' => $data]);

        // Calculate the total Gaji and Operasional
        $totalGaji = $data->sum('Gaji');
        $totalOperasional = $data->sum('Operasional');

        // Calculate the progress as a percentage of Gaji and Operasional out of the total
        $total = $totalGaji + $totalOperasional;
        $progressGaji = $total > 0 ? ($totalGaji / $total) * 100 : 0;
        $progressOperasional = $total > 0 ? ($totalOperasional / $total) * 100 : 0;

        // Format the progress values to one decimal place
        $progressGaji = number_format($progressGaji, 1);
        $progressOperasional = number_format($progressOperasional, 1);

        // Generate chart URLs using QuickChart
        $qcGaji = new QuickChart(array(
            'width' => 300,
            'height' => 50,
            'version' => '2.9.4',
        ));

        $configGaji = <<<EOD
{
  type: 'progressBar',
  data: {
    datasets: [
      {
        data: [$progressGaji],
      },
    ],
  },
}
EOD;

        $qcGaji->setConfig($configGaji);
        $chartUrlGaji = $qcGaji->getUrl();

        $qcOperasional = new QuickChart(array(
            'width' => 300,
            'height' => 50,
            'version' => '2.9.4',
        ));

        $configOperasional = <<<EOD
{
  type: 'progressBar',
  data: {
    datasets: [
      {
        data: [$progressOperasional],
      },
    ],
  },
}
EOD;

        $qcOperasional->setConfig($configOperasional);
        $chartUrlOperasional = $qcOperasional->getUrl();

        // Pass the progress values and chart URLs to the view
        return view('dipa01', compact('progressGaji', 'progressOperasional', 'chartUrlGaji', 'chartUrlOperasional'));
    }
}
