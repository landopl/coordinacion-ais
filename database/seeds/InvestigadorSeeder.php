<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\investigador;

class InvestigadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	//EJEMPLO PARA PODER AGREGAR DATOS A LAS TABLAS CON LOS SEEDERS

        // DB::table('investigadores')->insert([

        // 	'tipo_id'					  => '2',
        // 	'nombre' 					  => 'Carmen',
        // 	'apellido' 					  => 'Carmona',
        // 	'cedula' 					  => '3300875',
        // 	'sexo'						  => 'femenino',
        // 	'correo'					  => 'carmen@gmail.com',
        // 	'telefono'					  => '04144345678',
        // 	'fecha_registro_investigador' => '2018-01-04'
        // ]);


    	factory(investigador::class, 5)->create();
    }
}
