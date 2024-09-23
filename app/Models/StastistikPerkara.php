<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StastistikPerkara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perkara',
        'sisa_lama',
        'perkara_masuk',
        'perkara_putus',
        'sisa_baru',
        'rasio',
        'E-court',
        'BHT'
    ];
}
