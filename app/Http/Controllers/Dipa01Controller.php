<?php

namespace App\Http\Controllers;

use App\Models\Dipa01Data;
use Illuminate\Http\Request;
use QuickChart;

class Dipa01Controller extends Controller
{
    public function showChart()
    {
        // Mengambil semua data dari model Dipa01Data
        $data = Dipa01Data::all();

        // Calculate total salary and operational costs
        $totalGaji = $data->sum('Gaji');
        $totalOperasional = $data->sum('Operasional');

        // Calculate the progress as a percentage of Gaji and Operasional out of the total
        $total = $totalGaji + $totalOperasional;
        $progressGaji = $total > 0 ? ($totalGaji / $total) * 100 : 0;
        $progressOperasional = $total > 0 ? ($totalOperasional / $total) * 100 : 0;

        // Format the progress values to one decimal place
        $progressGaji = number_format($progressGaji, 1);
        $progressOperasional = number_format($progressOperasional, 1);

        // Calculate total budgeted and realized amounts for salary and operational costs
        $totalGajiPagu = $data->sum('GajiPagu');
        $totalGajiRealisasi = $data->sum('GajiRealisasi');
        $totalOperasionalPagu = $data->sum('OperasionalPagu');
        $totalOperasionalRealisasi = $data->sum('OperasionalRealisasi');

        // Calculate progress as a percentage of Gaji and Operasional from their respective budgets
        $progressGajiPagu = $totalGajiPagu > 0 ? ($totalGajiRealisasi / $totalGajiPagu) * 100 : 0;
        $progressOperasionalPagu = $totalOperasionalPagu > 0 ? ($totalOperasionalRealisasi / $totalOperasionalPagu) * 100 : 0;

        // Format the progress values to one decimal place
        $progressGajiPagu = number_format($progressGajiPagu, 1);
        $progressOperasionalPagu = number_format($progressOperasionalPagu, 1);

        // Generate chart URL using QuickChart for Gaji
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
        data: [$progressGajiPagu],
      },
    ],
  },
}
EOD;

        $qcGaji->setConfig($configGaji);
        $chartUrlGaji = $qcGaji->getUrl();

        // Generate chart URL using QuickChart for Operasional
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
        data: [$progressOperasionalPagu],
      },
    ],
  },
}
EOD;

        $qcOperasional->setConfig($configOperasional);
        $chartUrlOperasional = $qcOperasional->getUrl();

        // Calculate additional progress percentages for Gaji and Operasional out of the total
        $progressGajiTotal = $total > 0 ? ($totalGaji / $total) * 100 : 0;
        $progressOperasionalTotal = $total > 0 ? ($totalOperasional / $total) * 100 : 0;

        // Format these additional progress values to one decimal place
        $progressGajiTotal = number_format($progressGajiTotal, 1);
        $progressOperasionalTotal = number_format($progressOperasionalTotal, 1);

        // Return the view with the calculated progress values and chart URLs
        return view('dipa01', compact('progressGaji', 'progressOperasional', 'chartUrlGaji', 'chartUrlOperasional', 'progressGajiTotal', 'progressOperasionalTotal'));
    }
}
