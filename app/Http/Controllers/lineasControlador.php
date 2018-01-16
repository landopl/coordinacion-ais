<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\linea_investigacion; // se agrega para poder llamar al modelo que se conectara con dicha tabla en la base de dato
use Laracasts\Flash\Flash; // se agrega la clase de flash para poder usar los mensajes con flash
use App\Http\Requests\lineaRequest; // se llama la clase donde esta contenido las validaciones de los campos 

class lineasControlador extends Controller
{
    
    public function index(Request $request) //Se añadio de forma manual el Request $request para poder utilizar el scoper buscador
    {
        $lineas = linea_investigacion::Search($request->denominacion)->orderBy('id', 'ASC')->paginate(5);
        return view('admin.lineas.consultaLineas')->with('lineas', $lineas);  
    }

    public function create()
    {
        return view('admin.lineas.crearLinea');
    }

    public function store(lineaRequest $request)
    {
        $lineas= new linea_investigacion($request->all());
        $lineas->save();

        flash('Registro exitoso')->success();
        return redirect()->route('lineas.index');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $lineas = linea_investigacion::find($id);
        return view('admin.lineas.editar')->with('lineas', $lineas);
    }

    public function update(Request $request, $id)
    {
        $lineas = linea_investigacion::find($id);
        $lineas->fill($request->all());// fill toma todos los campos de la linea y los remplaza con los nuevos datos ingresados
        $lineas->save();

        flash('La linea de investigacion <strong>'. $lineas->denominacion . '</strong> ha sido modificada exitosamente')->warning();
        return redirect()->route('lineas.index');
    }

    public function destroy($id)
    {
        $lineas = linea_investigacion::find($id);
        $lineas->delete();

        flash('La linea de investigacion <strong>'. $lineas->denominacion . '</strong> ha sido eliminada exitosamente')->error();
        return redirect()->route('lineas.index');
    }
}