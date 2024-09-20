<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipa01DataTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dipa01_data', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('Gaji_dan_Tunjangan'); // Correct column name
            $table->integer('Operasional');
            $table->bigInteger('GajiPagu');
            $table->bigInteger('GajiRealisasi');
            $table->bigInteger('OperasionalPagu');
            $table->bigInteger('OperasionalRealisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dipa01_data');
    }
}
