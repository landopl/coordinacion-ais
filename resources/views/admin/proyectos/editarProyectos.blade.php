@extends('admin.plantilla.layout')

@section('content')

  <h1>Editar Proyecto</h1><br>

  <div class="form-horizontal">
    {!! Form::open(['route' => ['proyectos.update', $proyectos->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {!! Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']) !!}
        {!! Form::text('titulo', $proyectos->titulo, ['class' => 'col-sm-5', 'placeholder' => 'nombre del proyecto' ,'required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('resumen', 'Resumen', ['class' => 'control-label col-xs-3']) !!}
        {!! Form::textarea('resumen', $proyectos->resumen, ['class' => 'col-sm-5', 'placeholder' => '' ,'required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('objetivos', 'Objetivos', ['class' => 'control-label col-xs-3']) !!}
        {!! Form::textarea('objetivos', $proyectos->objetivos, ['class' => 'col-sm-5', 'placeholder' => 'objetivos del proyecto' ,'required']) !!}     
      </div>

      <div class="form-group">
        {!! Form::label('justificacion', 'Justificacion', ['class' => 'control-label col-xs-3']) !!}
        {!! Form::textarea('justificacion', $proyectos->justificacion, ['class' => 'col-sm-5', 'placeholder' => 'Justificacion del proyecto' ,'required']) !!}
      </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <label class="radio-inline">
            <b>{{ 'Seleccione la linea de investigacion a la que pertenece el proyecto' }}</b><br>
            @foreach($lineas as $linea)
              <input type="radio" name="linea_investigacion_id" value= {!! $linea['id'] !!} checked>{{ $linea['denominacion']}}<br>
            @endforeach
          </label>
        </div>
      </div>

      {{ Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d")) }}  
      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <br>
          <label class="radio-inline">
            <b>{{ 'Seleccione el tipo de proyecto' }}</b><br>
            @foreach($tipo_proyectos as $tipo_proyecto)
              <input type="radio" name="tipo_proyecto" value= {!! $tipo_proyecto['proyecto_tipo_id'] !!} checked>{{ $tipo_proyecto['tipo_proyecto']}}<br>
            @endforeach
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat'])!!}
        </div>    
      </div>
    {!! Form::close() !!}
  </div>
@stop