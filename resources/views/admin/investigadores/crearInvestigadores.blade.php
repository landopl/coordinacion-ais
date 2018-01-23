@extends('admin.plantilla.layout')

@section('content')

	@section('h1', 'Registrar Investigadores')

	<div class="form-horizontal">
		{!! Form::open(['route' => 'investigadores.store', 'method' => 'POST']) !!}

			<div class="form-group">
				{!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('nombre', null, ['class' => 'col-sm-5', 'required']) !!}
			</div>

			<div class="form-group">	
				{!! Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('apellido', null, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">		
				{!! Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('cedula', null, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9">
					<label class="radio-inline">
						<b>{{ 'Sexo' }}</b><br>
						<input type="radio" name="sexo" value= "femenino" checked>Femenino<br>
						<input type="radio" name="sexo" value= "masculino" checked>Masculino<br>
					</label>
				</div>
			</div>

			<div class="form-group">		
				{!! Form::label('correo', 'Correo', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::email('correo', null, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">	
				{!! Form::label('telefono', 'Telefono', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('telefono', null, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5 select-denominacion','placeholder' => 'Seleccione una linea de investigacion','required']) !!} <!-- en la clase select-denominacion es para modificar el select con el estilo de chosen de jquery, que con el script de abajo hace las modificaciones-->
			</div>

			<div class="form-group">
				{!! Form::label('tipo_investigador', 'Tipo de investigador', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::select('tipo_investigador', $tipos, null, ['class' => 'col-sm-5 select-tipo_investigador','placeholder' => 'Seleccione un tipo de investigador','required']) !!}
			</div>

			{{ Form::hidden('fecha_registro_investigador', $fecha_registro_investigador = date("Y-m-d")) }}

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
		$('.select-denominacion').chosen({
			
		});

		$('.select-tipo_investigador').chosen({
			disable_search_threshold: 10
		});
	</script>

@endsection
