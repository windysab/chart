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
        $labels = array_values(array_unique($chartData->pluck('label')->toArray()));
        $paguData = array_values(array_unique($chartData->pluck('pagu')->toArray()));
        $realisasiData = array_values(array_unique($chartData->pluck('realisasi')->toArray()));
        $P = array_values(array_unique($chartData->pluck('P')->toArray()));
        $R = array_values(array_unique($chartData->pluck('R')->toArray()));

        return view('chart', compact('chartData', 'labels', 'paguData', 'realisasiData', 'P', 'R'));
    }
}
