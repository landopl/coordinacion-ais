@extends('admin.plantilla.layout')

@section('content')

	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
        		<div class="col-xs-12">
          			<div class="box">
            			<div class="box-header">
              			<h3 class="box-title">Coordinadores</h3>

                    {!!Form::open(['route' => 'coordinadores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])!!}
                      <div class="input-group">
                        {!!Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Buscar por cedula', 'aria-describedby' => 'buscar'])!!}
                        <span class="input-group-addon" id="buscar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                      </div>
                    {!!Form::close()!!}
            			</div>
            			<!-- /.box-header -->
            			<div class="box-body table-responsive no-padding">
              			<table class="table table-hover">
               					<tr>
                          <th>Linea de investigacion</th>
                  				<th>nombre</th>
                  				<th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cedula</th>
                          <th>Sexo</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Tipo de investigador</th>
                          <th>Fecha de registro</th>
                				</tr>
			                @foreach($coordinadores as $coordinador)
                        <tr> 
                          @foreach($lineas as $linea)
                            @if ($coordinador['linea_investigacion_id'] == $linea['id'])
                              <td>{{ $linea->denominacion }}</td>
                            @endif
                          @endforeach
                          @foreach($investigadores as $investigador)                           
                            @if ($coordinador['investigador_id'] == $investigador['id'])     
                              <td>{{ $investigador->nombre }}</td>
                              <td>{{ $investigador->nombre }}</td>
                              <td>{{ $investigador->apellido }}</td>
                              <td>{{ $investigador->cedula }}</td>
                              <td>{{ $investigador->sexo }}</td>
                              <td>{{ $investigador->correo }}</td>
                              <td>{{ $investigador->telefono }}</td>     
                            @endif
                          @endforeach
                          @foreach($tipos_investigadores as $tipo_investigador)
                            @if($investigador['tipo_id'] == $tipo_investigador['tipo_id'])
                              <td>{{ $tipo_investigador->tipo_investigador }}</td>
                            @endif
                          @endforeach

                          <td>{{ $investigador->fecha_registro_investigador }}</td>

                          {{-- <td><a href="{{ route('coordinadores.edit', $coordinador->id) }}" class="btn btn-default btn-flat">Editar</a></td> --}}

                          <td><a href="{{ route('admin.coordinadores.destroy', $coordinador->id) }}" onclick="return confirm('¿Esta seguro que desea eliminar el investigador?')" class="btn btn-default btn-flat">Eliminar</a></td>
                        </tr>
                      @endforeach
				            </table>
                    {!! $coordinadores->render() !!}
            			</div>
            		<!-- /.box-body -->
          			</div>
          		<!-- /.box -->
       			 </div>
      		</div>
		</section>
	</body>
@stop