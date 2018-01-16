<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto_nombre_tipo extends Model
{
    protected $table = "proyectos_nombre_tipo";

    protected $fillable = ['proyecto_tipo_id', 'tipo_proyecto'];


    //--------------RELACIONES-----------------------------------------------

    public function proyecto_tipo()
    {
    	return $this->hasOne('App\proyecto_tipo');
    }
}
