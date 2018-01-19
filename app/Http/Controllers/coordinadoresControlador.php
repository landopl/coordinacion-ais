<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\investigador;
use App\linea_investigacion;
use App\linea_investigador;
use App\linea_coordinador;
use App\tipo_investigador;
use Laracasts\Flash\Flash;
use App\Http\Requests\coordinadorRequest;

class coordinadoresControlador extends Controller
{
    
    public function index()
    {
        $lineas               = linea_investigacion::all();
        $investigadores       = investigador::all();
        $tipos_investigadores = tipo_investigador::all();
        $coordinadores        = linea_coordinador::orderBy('id', 'ASC')->paginate(5);

        return view('admin.coordinadores.consultarCoordinador', [
            'coordinadores'        => $coordinadores,
            'investigadores'       => $investigadores, 
            'lineas'               => $lineas, 
            'tipos_investigadores' => $tipos_investigadores
        ]);
    }

    public function create()
    {
        $lineas = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id');

        return view('admin.coordinadores.crearCoordinadores', ['lineas' => $lineas]);
    }

    public function store(coordinadorRequest $request)
    {
        $coordinador       = new investigador($request->all());
        $lineas            = linea_investigacion::find(request());
        $coordinadorDatos  = investigador::all();
        $linea_coordinador =  new linea_coordinador($request->all());
        
        foreach ($lineas as $linea) 
        {
            $linea_coordinador['linea_investigacion_id'] = $linea['id'];
        }
        foreach ($coordinadorDatos as $coordinadorDato) {
            
            if ($coordinadorDato['cedula'] == $coordinador['cedula']) 
            {
                $linea_coordinador['investigador_id'] = $coordinadorDato['id'];              
            }
        }
        $linea_coordinador->save();

        flash('Registro exitoso')->success();
        return redirect()->route('coordinadores.index'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $coordinador = linea_coordinador::find($id);
        $coordinador->delete();

        flash('El coordinador ha sido eliminado exitosamente')->error();
        return redirect()->route('coordinadores.index');
    }
}
