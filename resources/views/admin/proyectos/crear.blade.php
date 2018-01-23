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