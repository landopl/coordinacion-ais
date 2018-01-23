<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class investigador extends Model
{
    //este es para dar con la tabla en la base de datos con la que se va a trabajar 
    protected $table = "investigadores";

    //fillable son los cammpos permitidos para mostrar los datos json (que campos quieres que traiga)
    protected $fillable =['tipo_id', 'nombre', 'apellido', 'cedula', 'sexo', 'correo', 'telefono', 'fecha_registro_investigador'];


    //------------------------------------RELACIONES------------------------------------------------

    public function tipo_investigador() //cuando la relacion es de muchos a uno el nombre de la funcion debe estar en singular
    {
    	return $this->belongsTo('App\tipo_investigador'); // Relacion de muchos a 1
    }

    public function investigadores_proyectos()
    {
        return $this->belongsToMany('App\proyecto')->withTimestamps(); // Relacion muchos a muchos EN ESTE COLOQUE EL WHITHTIMESTAMPS DE ULTIMO (CUALQUIER ERROR BORRO ESTE)
    }

    public function lineas_investigacion_investigadores()
    {
        return $this->belongsToMany('App\linea_investigacion'); //Relacion muchos a muchos
    }
     public function coordinador_linea()
    {
        return $this->hasOne('App\linea_coordinador');
    }

    public function investigador_linea()
    {
        return $this->hasMany('App\linea_investigador');
    }

    //SCOPE BUSCAR--------------------------------
    public function scopeBuscar($query, $data){
      $cedula= $data->cedula;
      $nombre= $data->nombre;
      $apellido= $data->apellido;
      return $query->where('cedula', 'LIKE', "%$cedula%")->where('nombre', 'LIKE', "%$nombre%")->where('apellido', 'LIKE', "%$apellido%");
    }
}
