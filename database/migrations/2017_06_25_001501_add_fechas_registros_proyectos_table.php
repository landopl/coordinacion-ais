<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechasRegistrosProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas_registros_proyectos', function (Blueprint $table) {
            $table->integer('proyecto_id')->unsigned();
            $table->date('fecha_registro_proyecto');

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
        Schema::dropIfExists('fechas_registros_proyectos');
    }
}
