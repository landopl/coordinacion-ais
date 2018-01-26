<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyecto;
use App\investigador;
use App\linea_investigacion;
use App\linea_investigador;
use App\tipo_investigador;

class investigadoresProyectosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = proyecto::orderBy('titulo', 'ASC')->pluck('titulo', 'id');
        $investigadores = investigador::orderBy('id', 'ASC')->pluck('cedula', 'nombre')->toArray();

        return view('admin.investigadoresProyectos.proinv')->with('proyecto', $proyecto)
                                                           ->with('investigadores', $investigadores);
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
        $investigador        = investigador::find($id);
        $proyectos    = proyecto::find($id);

        return view('admin.investigadoresProyectos.asignarInvestigador')
                                                                        ->with('investigador', $investigador)
                                                                        ->with('proyectos', $proyectos);
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
        $investigadores = investigador::find($id);
        $proyectos = proyecto::find($id);
        
       
        dd($proyectos);
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
