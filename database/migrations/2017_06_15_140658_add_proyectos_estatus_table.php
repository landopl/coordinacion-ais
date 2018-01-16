<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProyectosEstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_estatus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
            $table->string('estatus');

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
        Schema::dropIfExists('proyectos_estatus');
    }
}
