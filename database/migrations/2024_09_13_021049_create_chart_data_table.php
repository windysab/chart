<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartDataTable extends Migration
{

public function up()
{
    Schema::create('statistik', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('value');
        $table->timestamps();
    });
}
}
return new CreateChartDataTable;
