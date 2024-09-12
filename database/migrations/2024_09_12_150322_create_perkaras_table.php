<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkarasTable extends Migration
{
    public function up()
    {
        Schema::create('perkaras', function (Blueprint $table) {
            $table->id();
            $table->string('PERKARA');
            $table->string('E-COURT');
            $table->integer('PUTUS');
            $table->integer('MASUK');
            $table->integer('BHT');
            $table->integer('SISA_LAMA');
            $table->integer('SISA_BARU');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perkaras');
    }
}
