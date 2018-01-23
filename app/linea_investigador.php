<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linea_investigador extends Model
{
    protected $table = "lineas_investigadores";

    protected $fillable = ['linea_investigacion_id', 'investigador_id'];


    //--------------RELACIONES-----------------------------------------------

    public function linea_investigador()
    {
    	return $this->belongsTo('App\investigador'); // Relacion de muchos a 1
    }

    public function linea_investigacion()
    {
    	return $this->belongsTo('App\linea_investigacion'); // Relacion de muchos a 1
    }

    public function lineas_investigaciones()
    {
        return $this->belongsToMany('App\linea_investigacion');
    }
}
