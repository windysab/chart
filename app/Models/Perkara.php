<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    use HasFactory;

    // Jika Anda memiliki kolom yang dapat diisi, tambahkan properti $fillable
    protected $fillable = [
        'PERKARA',
        'E-COURT',
        'PUTUS',
        'MASUK',
        'BHT',
        'SISA_LAMA',
        'SISA_BARU',
    ];
}
