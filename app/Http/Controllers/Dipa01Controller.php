<?php

namespace App\Http\Controllers;

use App\Models\Dipa01Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Dipa01Controller extends Controller
{
    public function showChart()
    {
        // Fetch all data from the Dipa01Data model
        $data = Dipa01Data::all();
        // Log::info('Dipa01 Data:', ['data' => $data]);

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

        // Pass the progress values to the view
        return view('dipa01', compact('progressGaji', 'progressOperasional'));
    }
}
