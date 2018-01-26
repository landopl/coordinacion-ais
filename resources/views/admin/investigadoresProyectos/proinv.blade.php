@extends('admin.plantilla.layout')

@section('content')

	<h1>Registrar Investigador En un Proyecto</h1>

	<br><br>

	<div class="form-horizontal">
		{!! Form::open(['route' => 'investigadoresProyectos.store', 'method' => 'POST']) !!}

		<div class="form-group">
			
			{!! Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::select('cedula', $investigadores, null, ['class' => 'col-sm-5', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('titulo', 'Titulo del proyecto', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::select('titulo', $proyecto, null, ['class' => 'col-sm-5 select-coordinador','placeholder' => 'Seleccione un proyecto','required']) !!}
		</div>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9"><br>
				{!! Form::submit('Registrar', ['class' => 'btn btn-success btn-flat'])!!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@stop

@section('js')
	<script>
		$('.select-coordinador').chosen({
			
		});
	</script>

@endsection