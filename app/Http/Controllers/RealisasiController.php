<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;
use QuickChart;

class RealisasiController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel realisasi
        $realisasiData = Realisasi::first();

        // Pastikan data diambil dalam format yang benar
        $decodedData = json_decode($realisasiData->data, true);

        // Tambahkan pengecekan apakah json_decode berhasil
        if (json_last_error() !== JSON_ERROR_NONE || !isset($decodedData['datasets'][0]['data'])) {
            return response()->json(['error' => 'Data tidak valid'], 400);
        }

        $data = $decodedData['datasets'][0]['data']; // Ambil semua nilai dari data

        // Hitung persentase sisa dari pagu setelah dikurangi realisasi
        $pagu = $realisasiData->pagu;
        $realisasi = $realisasiData->realisasi;
        $sisa = $pagu - $realisasi;

        // Hitung persentase dan format menjadi dua desimal
        $persentasePagu = number_format(100, 2); // Pagu selalu 100%
        $persentaseRealisasi = number_format(($realisasi / $pagu) * 100, 2);
        $persentaseSisa = number_format(($sisa / $pagu) * 100, 2);

        // Kirim pagu, realisasi, sisa, dan persentase ke view
        return view('realisasi', compact('data', 'pagu', 'realisasi', 'sisa', 'persentasePagu', 'persentaseRealisasi', 'persentaseSisa'));
    }


    public function getData()
    {
        // Ambil data dari tabel realisasi
        $realisasiData = Realisasi::first();

        // Pastikan data diambil dalam format yang benar
        $decodedData = json_decode($realisasiData->data, true);

        // Tambahkan pengecekan apakah json_decode berhasil
        if (json_last_error() !== JSON_ERROR_NONE || !isset($decodedData['datasets'][0]['data'])) {
            return response()->json(['error' => 'Data tidak valid'], 400);
        }

        $data = $decodedData['datasets'][0]['data']; // Ambil semua nilai dari data

        // Hitung persentase sisa dari pagu setelah dikurangi realisasi
        $pagu = $realisasiData->pagu;
        $realisasi = $realisasiData->realisasi;
        $sisa = $pagu - $realisasi;

        // Hitung persentase dan format menjadi dua desimal
        $persentasePagu = number_format(100, 2); // Pagu selalu 100%
        $persentaseRealisasi = number_format(($realisasi / $pagu) * 100, 2);
        $persentaseSisa = number_format(($sisa / $pagu) * 100, 2);

        // Kirim data
        return view('realisasi', compact('data', 'pagu', 'realisasi', 'sisa', 'persentasePagu', 'persentaseRealisasi', 'persentaseSisa'));
    }
}
