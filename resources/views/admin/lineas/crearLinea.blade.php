@extends('admin.plantilla.layout')

@section('content')

	@section('h1','Registrar Linea de Investigacion')

	<br><br>

	<div class="form-horizontal">
		{!! Form::open(['route' => 'lineas.store', 'method' => 'POST']) !!}

			<div class="form-group">		
				{!! Form::label('denominacion', 'Denominacion', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('denominacion', null, ['class' => 'col-sm-5', 'placeholder' => 'nombre de la linea de investigacion' ,'required']) !!}
			</div>

			<div class="form-group">		
				{!! Form::label('fecha_aprobacion_linea', 'Fecha de aprobacion', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::date('fecha_aprobacion_linea', null, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9"><br>
					{!! Form::submit('Registrar', ['class' => 'btn btn-success btn-flat'])!!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@stop