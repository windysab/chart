<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasi'; // Ensure the table name is correct

    // Specify the fillable fields
    protected $fillable = [
        'type', 'data', 'pagu', 'realisasi', 'P', 'R'
    ];
}
