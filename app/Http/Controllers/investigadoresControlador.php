<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\linea_investigacion;
use App\investigador;
use App\tipo_investigador;
use App\linea_investigador;
use Laracasts\Flash\Flash;
use App\Http\Requests\investigadorRequest;


class investigadoresControlador extends Controller
{
    
    public function index(Request $request)// PASO MANUALMENTE EL REQUEST $REQUEST PARA PODER USAR EL BUSCADOR 
    {
        $investigadores        = investigador::Buscar($request)->orderBy('id', 'ASC')->paginate(5);
        $lineas                = linea_investigacion::all();
        $lineas_investigadores = linea_investigador::all();
        $tipos_investigadores  = tipo_investigador::all();
        
        return view('admin.investigadores.consultaInvestigadores', [
            'investigadores'        => $investigadores, 
            'lineas'                => $lineas, 
            'lineas_investigadores' => $lineas_investigadores, 
            'tipos_investigadores'  => $tipos_investigadores
        ]);
    }

    public function create()
    {
        $lineas = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id'); //pluck lo que hace es traer los campos en forma de lista
        $tipos  = tipo_investigador::orderBy('tipo_investigador', 'ASC')->pluck('tipo_investigador', 'tipo_id');

        return view('admin.investigadores.crearInvestigadores', [
            'lineas' => $lineas, 
            'tipos'  => $tipos
        ]);
    }

    public function store(investigadorRequest $request)
    {
        $investigadores     = new investigador($request->all());
        $lineas             = linea_investigacion::find(request());
        $linea_investigador = new linea_investigador($request->all());
        $investigadores->save();

        $linea_investigador['investigador_id'] = $investigadores['id'];
        
        foreach ($lineas as $linea) 
        {
            $linea_investigador['linea_investigacion_id'] = $linea['id'];
        }
        $linea_investigador->save();

        flash('Registro exitoso')->success();
        return redirect()->route('investigadores.index'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $investigadores        = investigador::find($id);
        $investigadores->investigador_linea;
        $lineas                = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id');
        $lineas_investigadores = linea_investigador::all();
        $tipos_investigadores  = tipo_investigador::orderBy('tipo_investigador', 'ASC')->pluck('tipo_investigador', 'tipo_id');

        return view('admin.investigadores.editarInvestigador', [
            'investigadores'        => $investigadores, 
            'lineas'                => $lineas, 
            'lineas_investigadores' => $lineas_investigadores, 
            'tipos_investigadores'  => $tipos_investigadores
        ]);
    }

    //NOTA: MODIFICA TODO MENOS LA LINEA DE INVESTIGACION. PENDIENTE POR ARREGLAR....
    public function update(Request $request, $id)
    {
        $investigadores = investigador::find($id);
        $investigadores->fill($request->all());
        $investigadores->save();
       
        flash('El investigador <strong>'. $investigadores->nombre . '</strong> ha sido modificado exitosamente')->warning();
        return redirect()->route('investigadores.index');
    }

    public function destroy($id)
    {
        $investigador = investigador::find($id);
        $investigador->delete();

        flash('El investigador '. $investigador->nombre . $investigador->apellido . ' ha sido eliminado exitosamente')->error();
        return redirect()->route('investigadores.index');
    }
}