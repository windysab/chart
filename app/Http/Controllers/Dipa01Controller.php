<?php

namespace App\Http\Controllers;

use App\Models\Dipa01Data;
use Illuminate\Http\Request;

class Dipa01Controller extends Controller
{
    public function showChart()
    {
        // Mengambil semua data dari model Dipa01Data
        $data = Dipa01Data::all();

        // Calculate total salary and operational costs
        $totalGaji = $data->sum('Gaji_dan_Tunjangan');
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

        // Return the view with the calculated progress values and chart data
        return view('dipa01', compact(
            'progressGaji',
            'progressOperasional',
            'totalGajiPagu',
            'totalGajiRealisasi',
            'totalOperasionalPagu',
            'totalOperasionalRealisasi',
            'progressGajiPagu',
            'progressOperasionalPagu'
        ));
    }
}
