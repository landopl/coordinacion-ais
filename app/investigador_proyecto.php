<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class investigador_proyecto extends Model
{
    protected $table = "investigadores_proyectos";


    protected $fillable = ['proyecto_id', 'investigador_id'];

    //--------------RELACIONES-----------------------------------------------

    public function investigador_proyecto()
    {
    	return $this->hasOne('App\investigador');
    }

    public function proyecto_investigador()
    {
    	return $this->hasOne('App\proyecto');
    }
}
