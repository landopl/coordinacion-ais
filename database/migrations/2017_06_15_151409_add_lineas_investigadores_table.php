<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLineasInvestigadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_investigadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('investigador_id')->unsigned();
            $table->integer('linea_investigacion_id')->unsigned();


            $table->foreign('investigador_id')->references('id')->on('investigadores')->onDelete('cascade');

            $table->foreign('linea_investigacion_id')->references('id')->on('lineas_investigacion')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**x
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas_investigadores');
    }
}
