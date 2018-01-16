<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo');
            $table->text('resumen');
            $table->text('objetivos');
            $table->text('justificacion');
            $table->integer('linea_investigacion_id')->unsigned();


            $table->foreign('linea_investigacion_id')->references('id')->on('lineas_investigacion');



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
        Schema::dropIfExists('proyectos');
    }
}
