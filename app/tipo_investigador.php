<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_investigador extends Model
{
    protected $table = "tipos_investigadores";

    protected $fillable = ['tipo_id', 'tipo_investigador'];


    //--------------RELACIONES-----------------------------------------------

    public function investigadores() //cuando es relacion de uno a muchos el nombre de la funcion debe ser en plural
    {
    	return $this->hasMany('App\investigador'); // Relacion de 1 a muchos
    }

}
