<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto_url extends Model
{
    protected $table = "proyectos_url";

    protected $fillable = ['proyecto_id', 'documento_url'];


    //--------------RELACIONES-----------------------------------------------

    public function proyecto_url()
    {
    	return $this->hasMany('App\proyecto');
    }
}
