@extends('admin.plantilla.layout')


@section('content')

	<h1>Registrar Investigador</h1>

	<br><br>

	{!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}

		<div class="form-group">
			
			{!! Form::label('usuario', 'Usuario') !!}
			{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'ingresar usuario' ,'required']) !!}
		</div>

		<div class="form-group">
			
			{!! Form::label('clave', 'Clave') !!}
			{!! Form::password('clave', ['class' => 'form-control', 'placeholder' => '****' ,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-default btn-flat'])!!}
		</div>


	{!! Form::close() !!}



@stop