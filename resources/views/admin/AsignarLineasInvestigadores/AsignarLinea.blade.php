@extends('admin.plantilla.layout')

@section('content')

	@foreach($lineas_investigadores as $linea_investigador)
		@if($investigador->id != $linea_investigador->investigador_id)

			@section('h1', 'Asignar nueva linea de investigacion')

			<div class="form-horizontal">
				{!! Form::open(['route' =>['AsignarLineasInvestigadores.update', $investigador->id], 'method' => 'PUT']) !!}

					<div class="form-group">		
						{!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']) !!}
						{!! Form::text('nombre', $investigador->nombre, ['class' => 'col-sm-5', 'disabled']) !!}
					</div>

					<div class="form-group">		
						{!! Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']) !!}
						{!! Form::text('apellido', $investigador->apellido, ['class' => 'col-sm-5','disabled']) !!}
					</div>

					<div class="form-group">		
						{!! Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']) !!}
						{!! Form::text('cedula', $investigador->cedula, ['class' => 'col-sm-5','disabled']) !!}
					</div>


					
							<div class="form-group">
							{!! Form::label('linea_investigacion_id', 'Linea de investigacion', ['class' => 'control-label col-xs-3']) !!}
							{!! Form::select('linea_investigacion_id', $lineas, null, ['class' => 'col-sm-5 select-denominacion','placeholder' => 'Seleccione una linea de investigacion','required']) !!}
							</div>
						

					
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9"><br>
							{!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat'])!!}
						</div>	
					</div>
				{!! Form::close() !!}
			</div>
		@else
			{!!redirect()->route('investigadores.show', $investigador->id)!!}
		@endif
	@endforeach
@endsection
@section('js')
	<script>
		$('.select-denominacion').chosen({
			
		});
	</script>
@endsection