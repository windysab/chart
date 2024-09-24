<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StastistikPerkara;

class StastistikPerkaraController extends Controller
{
    public function index()
    {
        $data = StastistikPerkara::all();

        $labels = ['Sisa Lama', 'Perkara Masuk', 'Perkara Putus', 'Sisa Baru'];

        // Filter data for 'Gugatan' and 'Permohonan'
        $gugatan = $data->where('nama_perkara', 'Gugatan')->first();
        $permohonan = $data->where('nama_perkara', 'Permohonan')->first();

        $gugatanData = [
            $gugatan->sisa_lama,
            $gugatan->perkara_masuk,
            $gugatan->perkara_putus,
            $gugatan->sisa_baru,
        ];

        $permohonanData = [
            $permohonan->sisa_lama,
            $permohonan->perkara_masuk,
            $permohonan->perkara_putus,
            $permohonan->sisa_baru,
        ];

        return view('stastistik_perkara', [
            'labels' => $labels,
            'gugatanData' => $gugatanData,
            'permohonanData' => $permohonanData,
            'perkara' => ['Gugatan', 'Permohonan'],
            'sisa_lama' => [$gugatan->sisa_lama, $permohonan->sisa_lama],
            'perkara_masuk' => [$gugatan->perkara_masuk, $permohonan->perkara_masuk],
            'perkara_putus' => [$gugatan->perkara_putus, $permohonan->perkara_putus],
            'sisa_baru' => [$gugatan->sisa_baru, $permohonan->sisa_baru],
        ]);
    }
}
