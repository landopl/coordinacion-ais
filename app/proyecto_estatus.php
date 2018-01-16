<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto_estatus extends Model
{
 	protected $table = "proyectos_estatus";

    protected $fillable = ['proyecto_id', 'estatus'];


    //--------------RELACIONES-----------------------------------------------

    public function estatus_proyectos()
    {
    	return $this->hasMany('App\proyecto'); // Relacion de 1 a muchos
    }


}
