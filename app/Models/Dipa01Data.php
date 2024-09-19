<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dipa01Data extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'dipa01_data';

    // Define the fillable properties
    protected $fillable = [
        'label',
        'Gaji',
        'Operasional',
    ];
}
