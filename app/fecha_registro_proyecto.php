<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fecha_registro_proyecto extends Model
{
    protected $table = "fechas_registros_proyectos";

    //fillable son los cammpos permitidos para mostrar los datos json (que campos quieres que traiga)
    protected $fillable =['proyecto_id', 'fecha_registro_proyecto'];


    //--------------RELACIONES-----------------------
    
    public function fechas_registros_proyectos()
    {
    	return $this->hasMany('App\proyecto'); // Relacion de uno a muchos
    }
}
