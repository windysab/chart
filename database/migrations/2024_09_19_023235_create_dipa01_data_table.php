<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipa01DataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa01_data', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('Gaji');
            $table->integer('Operasional');
            $table->integer('GajiPagu');
            $table->integer('GajiRealisasi');
            $table->integer('OperasionalPagu');
            $table->integer('OperasionalRealisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dipa01_data');
    }
}
