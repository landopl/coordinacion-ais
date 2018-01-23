@extends('admin.plantilla.layout')

@section('content')

  <h1>Editar Proyecto</h1><br>

  <div class="form-horizontal">
    {!! Form::open(['route' => ['proyectos.update', $proyectos->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {!! Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']) !!}
        {!! Form::textarea('titulo', $proyectos->titulo, ['class' => 'col-sm-5', 'placeholder' => 'nombre del proyecto' ,'required']) !!}
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
      {!! Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']) !!}
      {!! Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5 select-estilo','placeholder' => 'Seleccione una linea de investigacion','required']) !!}
    </div>

    {{ Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d")) }}  

    <div class="form-group">
      {!! Form::label('tipo_proyecto', 'Tipo de proyecto', ['class' => 'control-label col-xs-3']) !!}
      {!! Form::select('tipo_proyecto', $tipo_proyectos, null, ['class' => 'col-sm-5 select-tipo_proyecto','placeholder' => 'Seleccione un tipo de proyecto','required']) !!}
    </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat'])!!}
        </div>    
      </div>
    {!! Form::close() !!}
  </div>
@stop

@section('js')
  <script>
    $('.select-estilo').chosen({
      
    });
    $('.select-tipo_proyecto').chosen({
      disable_search_threshold: 10
    });

  </script>

@endsection