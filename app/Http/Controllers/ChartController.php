<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showChart()
    {
        // Ambil data dari database
        $chartData = DB::table('chart_data')->get();

        // Siapkan data untuk chart
        $labels = $chartData->pluck('label')->toArray();
        $paguData = $chartData->pluck('pagu')->toArray();
        $realisasiData = $chartData->pluck('realisasi')->toArray();
        $P = $chartData->pluck('P')->toArray();
        $R = $chartData->pluck('R')->toArray();

        return view('chart', compact('chartData', 'labels', 'paguData', 'realisasiData', 'P', 'R'));
    }
}
