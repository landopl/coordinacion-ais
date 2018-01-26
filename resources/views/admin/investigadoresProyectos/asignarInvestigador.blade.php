@extends('admin.plantilla.layout')

@section('content')

	<h1>Asignar investigador a un proyecto</h1>

	<br><br>

	<div class="form-horizontal">
		{!! Form::open(['route' =>['investigadoresProyectos.update', $proyectos->id], 'method' => 'PUT']) !!}

			<div class="form-group">		
				{!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('nombre', $investigador->nombre, ['class' => 'col-sm-5', 'required', 'disabled']) !!}
			</div>

			<div class="form-group">		
				{!! Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('apellido', $investigador->apellido, ['class' => 'col-sm-5','required', 'disabled']) !!}
			</div>

			<div class="form-group">		
				{!! Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('cedula', $investigador->cedula, ['class' => 'col-sm-5','required', 'disabled']) !!}
			</div>

			<div class="form-group">
				<select>
     				<option>Seleccione un proyecto</option>
     				@foreach($proyectos as $proyecto)
    					<option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
     				@endforeach
				</select>
			</div>

			                       
			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9"><br>
					{!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat'])!!}
				</div>	
			</div>
		{!! Form::close() !!}
	</div>
@stop

@section('js')
	<script>
		$('.select-denominacion').chosen({
			
		});

		$('.proyectos').chosen({
			disable_search_threshold: 10
		});
	</script>

@endsection