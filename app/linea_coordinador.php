<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linea_coordinador extends Model
{
     protected $table = "lineas_coordinadores";


    protected $fillable = ['linea_investigacion_id', 'investigador_id'];

    //--------------RELACIONES-----------------------------------------------

    public function linea_coordinador()
    {
    	return $this->hasOne('App\investigador');
    }

    public function coordinador_linea_investigacion()
    {
    	return $this->hasOne('App\linea_investigacion');
    }
}
