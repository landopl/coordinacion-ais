@extends('admin.plantilla.layout')

@section('content')

	<h1>Editar la linea de investigacion: <strong>{{" " . $lineas->denominacion }}</strong> </h1>

	<br><br>

	<div class="form-horizontal">
		{!! Form::open(['route'=>['lineas.update',$lineas->id],'method' => 'PUT']) !!}
 		
			<div class="form-group">		
				{!! Form::label('denominacion', 'Denominacion', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::text('denominacion', $lineas->denominacion, ['class' => 'col-sm-5', 'placeholder' => 'nombre de la linea de investigacion' ,'required']) !!}
			</div>

			<div class="form-group">		
				{!! Form::label('fecha_aprobacion_linea', 'Fecha de aprobacion', ['class' => 'control-label col-xs-3']) !!}
				{!! Form::date('fecha_aprobacion_linea', $lineas->fecha_aprobacion_linea, ['class' => 'col-sm-5','required']) !!}
			</div>

			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9"><br>
					{!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat'])!!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>	
@stop