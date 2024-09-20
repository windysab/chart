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
            $table->bigInteger('Keperluan_sehari_hari_Pagu');
            $table->bigInteger('Keperluan_sehari_hari_Realisasi');
            $table->bigInteger('Langganan_daya_dan_jasa_Pagu');
            $table->bigInteger('Langganan_daya_dan_jasa_Realisasi');
            $table->bigInteger('Pemeliharaan_kantor_Pagu');
            $table->bigInteger('Pemeliharaan_kantor_Realisasi');
            $table->bigInteger('Pembayaran_Lainnya_Pagu');
            $table->bigInteger('Pembayaran_Lainnya_Realisasi');
            $table->bigInteger('Bantuan_sewa_rumah_dinas_hakim_Pagu');
            $table->bigInteger('Bantuan_sewa_rumah_dinas_hakim_Realisasi');
            $table->bigInteger('Perjalanan_dinas_Pagu');
            $table->bigInteger('Perjalanan_dinas_Realisasi');
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
