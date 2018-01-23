<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\linea_investigacion;
use App\proyecto;
use App\proyecto_tipo;
use App\proyecto_nombre_tipo;
use App\proyecto_estatus;
use App\fecha_registro_proyecto;
use App\fecha_inicio_proyecto;
use App\fecha_culminacion_proyecto;
use Laracasts\Flash\Flash;
use App\Http\Requests\proyectosRequest;

class proyectosControlador extends Controller
{
    public function index(Request $request)
    {
        $proyectos          = proyecto::BuscarProyecto($request->titulo)->orderBy('id', 'ASC')->paginate(1);
        $proyectos_tipo     = proyecto_tipo::all();
        $proyectos_nombre   = proyecto_nombre_tipo::all();
        $fechas_registro    = fecha_registro_proyecto::all();
        $fechas_inicio      = fecha_inicio_proyecto::all();
        $fechas_culminacion = fecha_culminacion_proyecto::all();
        $estatus            = proyecto_estatus::all();
        $lineas             = linea_investigacion::all();
        
        return view('admin.proyectos.consultaProyectos', [
            'proyectos'          => $proyectos, 
            'proyectos_tipo'     => $proyectos_tipo, 
            'fechas_registro'    => $fechas_registro, 
            'fechas_inicio'      => $fechas_inicio, 
            'fechas_culminacion' => $fechas_culminacion, 
            'estatus'            => $estatus, 
            'lineas'             => $lineas, 
            'proyectos_nombre'   => $proyectos_nombre
        ]);
    }

    public function create()
    {
        $lineas = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id');
        $lineas->toArray();
        $tipo_proyectos = proyecto_nombre_tipo::orderBy('tipo_proyecto', 'ASC')->pluck('tipo_proyecto', 'proyecto_tipo_id');
        
        return view('admin.proyectos.crear', [
            'lineas'         => $lineas, 
            'tipo_proyectos' => $tipo_proyectos
        ]);
    }

    public function store(proyectosRequest $request)
    {
        $proyectos = new proyecto($request->all());
        $proyectos->save();

        $proyecto    = proyecto::all();
        $proyecto_id = $proyecto->last();

        $proyecto_tipo = new proyecto_tipo($request->all());
        $proyecto_tipo['proyecto_id'] = $proyecto_id['id'];

        $proyecto_nombre_tipo = new proyecto_nombre_tipo($request->all());
        $proyecto_tipo['proyecto_tipo_id'] = $proyecto_nombre_tipo['tipo_proyecto'];
        $proyecto_tipo->save();

        $fecha_registro_proyecto = new fecha_registro_proyecto($request->all());
        $fecha_registro_proyecto['proyecto_id'] = $proyecto_id['id'];
        $fecha_registro_proyecto->save();

        $proyecto_estatus = new proyecto_estatus($request->all());
        $proyecto_estatus['proyecto_id'] = $proyecto_id['id'];
        $proyecto_estatus['estatus'] = 'Por iniciar';
        $proyecto_estatus->save();

        flash('Registro exitoso')->success();
        return redirect()->route('proyectos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $proyectos      = proyecto::find($id);
        $lineas         = linea_investigacion::orderBy('denominacion', 'ASC')->pluck('denominacion', 'id');
        $tipo_proyectos = proyecto_nombre_tipo::orderBy('tipo_proyecto', 'ASC')->pluck('tipo_proyecto', 'proyecto_tipo_id');
       
        return view('admin.proyectos.editarProyectos', [
            'proyectos'      => $proyectos, 
            'lineas'         => $lineas, 
            'tipo_proyectos' => $tipo_proyectos
        ]);
    }

    
    // NOTA: FALTA AGREGAR LA MODIFICACION DE TIPO DE PROYECTOS Y ANEXARLE A LA VISTA DE EDICION LOS CAMPOS DE FECHA DE INICIO Y DE CULMINACION
    public function update(Request $request, $id)
    {
        $proyectos = proyecto::find($id);
        $proyectos->fill($request->all());
        $proyectos->save();

        flash('El proyecto ha sido modificada exitosamente')->warning();
        return redirect()->route('proyectos.index');
    }

    public function destroy($id)
    {
        $proyecto = proyecto::find($id);
        $proyecto->delete();

        flash('El proyecto ha sido eliminado exitosamente')->warning();
        return redirect()->route('proyectos.index');
    }   
}