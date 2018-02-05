<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\linea_investigacion;
use App\linea_investigador;
use App\investigador;

class AsignarLineasInvestigadoresControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lineas = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id');
        $investigador =investigador::find($id);
        $lineas_investigadores = linea_investigador::all();
        
        return view('admin.AsignarLineasInvestigadores.AsignarLinea',[

            'lineas'                => $lineas,
            'investigador'          => $investigador,
            'lineas_investigadores' => $lineas_investigadores
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $linea_investigador = new linea_investigador($request->all());
        $investigador = investigador::find($id);
        $linea_investigador->investigador_id = $investigador->id;
        $linea_investigador->save();

          flash('El investigador <strong>'. $investigador->nombre . '</strong> se le ha asignado la linea de invesgacion exitosamente')->warning();
        return redirect()->route('investigadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
