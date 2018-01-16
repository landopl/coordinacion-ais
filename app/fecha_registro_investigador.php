<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fecha_registro_investigador extends Model
{
   	protected $table = "fecha_registro_investigadores";

    protected $fillable = ['investigador_id', 'fecha_registro_investigador'];


	//--------------RELACIONES-----------------------

    public function investigadores_registro()
    {
    	return $this->hasMany('App\investigador'); // Relacion de uno a muchos
    }
}
