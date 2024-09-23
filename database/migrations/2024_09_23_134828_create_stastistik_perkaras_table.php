<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stastistik_perkaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perkara');
            $table->integer('sisa_lama');
            $table->integer('perkara_masuk');
            $table->integer('perkara_putus');
            $table->integer('sisa_baru');
            $table->integer('rasio');
            $table->integer('E-court');
            $table->integer('BHT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stastistik_perkaras');
    }
};
