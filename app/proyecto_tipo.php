<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto_tipo extends Model
{
    protected $table = "proyectos_tipo";

    protected $fillable = ['proyecto_id', 'proyecto_tipo_id'];


    //--------------RELACIONES-----------------------------------------------
    
    public function proyecto_nombre_tipo()
    {
    	return $this->hasOne('App\proyecto_nombre_tipo');
    }

    public function proyectos_tipos()
    {
    	return $this->hasMany('App\proyecto');
    }
}
