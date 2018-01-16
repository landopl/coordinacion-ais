<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLineasCoordinadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_coordinadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('linea_investigacion_id')->unsigned();
            $table->integer('investigador_id')->unsigned();

              $table->foreign('investigador_id')->references('id')->on('investigadores')->onDelete('cascade');

            $table->foreign('linea_investigacion_id')->references('id')->on('lineas_investigacion')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('investigadores_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
            $table->integer('investigador_id')->unsigned();

              $table->foreign('investigador_id')->references('id')->on('investigadores')->onDelete('cascade');

            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');

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
        Schema::dropIfExists('lineas_coordinadores');
    }
}
