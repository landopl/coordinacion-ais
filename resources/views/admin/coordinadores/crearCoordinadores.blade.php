@extends('admin.plantilla.layout')

@section('content')

	<h1>Registrar Coordinador</h1>

	<br><br>

	<div class="form-horizontal">
		{!! Form::open(['route' => 'coordinadores.store', 'method' => 'POST']) !!}

		<div class="form-group">
			
			{!! Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::text('cedula', null, ['class' => 'col-sm-5', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']) !!}
			{!! Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5 select-coordinador','placeholder' => 'Seleccione una linea de investigacion','required']) !!}
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