<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;

class RealisasiController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // Ambil data dari tabel realisasi baru
        // $realisasiData = Realisasi::first();

        $realisasiData = Realisasi::latest()->first();



=======
        // Ambil data terbaru dari tabel realisasi
        $realisasiData = Realisasi::latest()->first();

        // Pastikan data diambil dalam format yang benar
        if (!isset($realisasiData->data)) {
            return response()->json(['error' => 'Data tidak valid'], 400);
        }

>>>>>>> 7b9c603654584416ab40888a8ad4a40eb22df117
        $data = $realisasiData->data; // Ambil nilai data langsung

        // Hitung persentase sisa dari pagu setelah dikurangi realisasi
        $pagu = $realisasiData->pagu;
        $realisasi = $realisasiData->realisasi;
        $sisa = $pagu - $realisasi;

        // Hitung persentase dan format menjadi dua desimal
        $persentasePagu = number_format(100, 2); // Pagu selalu 100%
        $persentaseRealisasi = number_format(($realisasi / $pagu) * 100, 2);
        $persentaseSisa = number_format(($sisa / $pagu) * 100, 2);

        // Ambil nilai P dan R
        $P = $realisasiData->P;
        $R = $realisasiData->R;
        $S = $P - $R;

        // Hitung persentase P dan R menjadi dua desimal
        $persentaseP = number_format(100, 2); // P selalu 100%
        $persentaseR = number_format(($R / $P) * 100, 2);
        $persentaseS = number_format(($S / $P) * 100, 2);

        // Kirim pagu, realisasi, sisa, persentase, P, dan R ke view
        return view('realisasi', compact('data', 'pagu', 'realisasi', 'sisa', 'persentasePagu', 'persentaseRealisasi', 'persentaseSisa', 'P', 'R', 'S', 'persentaseP', 'persentaseR', 'persentaseS'));
    }

<<<<<<< HEAD
    public function getData()
    {
        // Ambil data dari tabel realisasi
        $realisasiData = Realisasi::first();

        // Pastikan data diambil dalam format yang benar
        if (!isset($realisasiData->data)) {
            return response()->json(['error' => 'Data tidak valid'], 400);
        }

        $data = $realisasiData->data; // Ambil nilai data langsung

        // Hitung persentase sisa dari pagu setelah dikurangi realisasi
        $pagu = $realisasiData->pagu;
        $realisasi = $realisasiData->realisasi;
        $sisa = $pagu - $realisasi;

        // Hitung persentase dan format menjadi dua desimal
        $persentasePagu = number_format(100, 2); // Pagu selalu 100%
        $persentaseRealisasi = number_format(($realisasi / $pagu) * 100, 2);
        $persentaseSisa = number_format(($sisa / $pagu) * 100, 2);

        // Ambil nilai P dan R
        $P = $realisasiData->P;
        $R = $realisasiData->R;

        // Kirim data
        return view('realisasi', compact('data', 'pagu', 'realisasi', 'sisa', 'persentasePagu', 'persentaseRealisasi', 'persentaseSisa', 'P', 'R'));
    }

=======
>>>>>>> 7b9c603654584416ab40888a8ad4a40eb22df117
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'data' => 'required|numeric',
            'pagu' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'P' => 'required|numeric',
            'R' => 'required|numeric',
        ]);

        // Simpan data baru ke dalam tabel realisasi
        Realisasi::create($request->all());

        return redirect()->route('realisasi.index')->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $realisasi = Realisasi::findOrFail($id);

        // Kirim data ke view
        return view('pages.forms-validation', compact('realisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'data' => 'required|numeric',
            'pagu' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'P' => 'required|numeric',
            'R' => 'required|numeric',
        ]);

        // Update data berdasarkan ID
        $realisasi = Realisasi::findOrFail($id);
        $realisasi->update($request->all());

        return redirect()->route('realisasi.index')->with('success', 'Data updated successfully.');
    }
}
