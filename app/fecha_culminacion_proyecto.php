<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fecha_culminacion_proyecto extends Model
{
    protected $table = "fechas_culminacion_proyectos";

    //fillable son los cammpos permitidos para mostrar los datos json (que campos quieres que traiga)
    protected $fillable =['proyecto_id', 'fecha_culminacion_proyecto'];


    //--------------RELACIONES-----------------------

	//nombre de la tabla con la cual se va a relacionar (El nombre es en singular porque es de muchos a uno)
    public function fechas_proyectos() 
    {
    	return $this->belongsTo('App\proyecto'); // Relacion de muchos a uno
    }
}
