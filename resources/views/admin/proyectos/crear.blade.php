@extends('admin.plantilla.layout')

@section('content')

	@section('h1','Registrar Proyecto')

	<div class="form-horizontal">
		{!! Form::open(['route' => 'proyectos.store', 'method' => 'POST']) !!}
		
		<div class="form-group">
			{!! Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::textarea('titulo', null, ['class' => 'col-sm-5 trumbowyg-textarea', 'placeholder' => 'nombre del proyecto' ,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('resumen', 'Resumen', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::textarea('resumen', null, ['class' => 'col-sm-5', 'placeholder' => 'Resumen' ,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('objetivos', 'Objetivos', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::textarea('objetivos', null, ['class' => 'col-sm-5', 'placeholder' => 'objetivos del proyecto' ,'required']) !!}			
		</div>

		<div class="form-group">
			
			{!! Form::label('justificacion', 'Justificacion', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::textarea('justificacion', null, ['class' => 'col-sm-5', 'placeholder' => 'Justificacion del proyecto' ,'required']) !!}
		</div>

		<div class="form-group">
			<select class="col-xs-offset-3" name="linea_investigacion_id">
				<option>Seleccione la linea de investigacion</option>
					@foreach($lineas as $linea)
						<option value="{{$linea->id}}">{{$linea->denominacion}}</option>
					@endforeach
			</select>
			
		</div>

		{{ Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d")) }}  

		<div class="form-group">
			<select class="col-xs-offset-3" name="tipo_proyecto">
				<option>Seleccione el tipo de proyecto</option>
					@foreach($tipo_proyectos as $tipo_proyecto)
						<option value="{{$tipo_proyecto->proyecto_tipo_id}}">{{$tipo_proyecto->tipo_proyecto}}</option>
					@endforeach
			</select>
			
		</div>

		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9">
				{!! Form::submit('Registrar', ['class' => 'btn btn-success btn-flat'])!!}
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

		$('.trumbowyg-textarea').trumbowyg();

	</script>

@endsection