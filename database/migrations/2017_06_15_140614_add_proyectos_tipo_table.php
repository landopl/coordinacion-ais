<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProyectosTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_tipo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
            $table->integer('proyecto_tipo_id')->unsigned();

                

            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('proyecto_tipo_id')->references('proyecto_tipo_id')->on('proyectos_nombre_tipo')->onDelete('cascade');



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
        Schema::dropIfExists('proyectos_tipo');
    }
}
