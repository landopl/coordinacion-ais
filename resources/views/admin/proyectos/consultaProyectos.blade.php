@extends('admin.plantilla.layout')

@section('content')
	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
    		<div class="col-xs-12">
    			<div class="box">
      			<div class="box-header">
        			<h3 class="box-title">Listado de Proyectos</h3>

              {!!Form::open(['route' => 'proyectos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])!!}
                <div class="input-group">
                  {!!Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Buscar por titulo', 'aria-describedby' => 'titulo'])!!}
                  <span class="input-group-addon" id="titulo"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
              {!!Form::close()!!}
      			</div>
      			<!-- /.box-header -->
            
      			<div class="box-body table-responsive no-padding">
      				<table class="table table-hover">
     					 <tr>
        					<th>Titulo</th>
                  <th>Resumen</th>
                  <th>Objetivos</th>
                  <th>Justificacion</th>
        					<th>Linea de investigacion</th>
                  <th>Tipo de proyecto</th>
                  <th>Fecha de registro</th>
                  <th>Fecha de inicio</th>
                  <th>Fecha de culminacion</th>
                  <th>Estatus</th>
        				</tr>
                @foreach($proyectos as $proyecto)
                  <tr>    
                    <td>{{ $proyecto->titulo }}</td>
                    <td>{{ $proyecto->resumen }}</td>
                    <td>{{ $proyecto->objetivos }}</td>
                    <td>{{ $proyecto->justificacion }}</td>
                   
                    @foreach($lineas as $linea)
                      @if($linea['id'] == $proyecto['linea_investigacion_id'])
                        <td>{{ $linea->denominacion }}</td>
                      @endif
                    @endforeach

                    @foreach($proyectos_nombre as $proyecto_nombre)  
                      @foreach($proyectos_tipo as $proyecto_tipo)
                        @if($proyecto_tipo['proyecto_id'] == $proyecto['id'])
                          @if($proyecto_tipo['proyecto_tipo_id'] == $proyecto_nombre['proyecto_tipo_id'])
                            <td>{{ $proyecto_nombre->tipo_proyecto }}</td>
                          @endif
                        @endif
                      @endforeach
                    @endforeach

                    @foreach($fechas_registro as $fecha_registro)
                      @if($fecha_registro['proyecto_id'] == $proyecto['id'])
                        <td>{{ $fecha_registro->fecha_registro_proyecto }}</td>
                      @endif
                    @endforeach

                    @foreach($fechas_inicio as $fecha_inicio)
                        @if(empty($fecha_inicio)== false)
                          @if($fecha_inicio['proyecto_id'] == $proyecto['id'])
                            <td>{{ $fecha_inicio->fecha_inicio_proyecto }}</td>
                          @endif
                        @endif 
                    @endforeach

                    @if(empty($fecha_inicio)== true)
                      <td>{{ "---.--.--" }}</td>
                    @endif

                    @foreach($fechas_culminacion as $fecha_culminacion)
                      @if(empty($fechas_culminacion)== false)
                        @if($fecha_culminacion['proyecto_id'] == $proyecto['id'])
                          <td>{{ $fecha_culminacion->fecha_culminacion_proyecto }}</td>
                        @endif
                      @endif
                    @endforeach

                    @if(empty($fecha_culminacion)== true)
                      <td>{{ "---.--.--" }}</td>
                    @endif

                    @foreach($estatus as $estatu)
                      @if($estatu['proyecto_id'] == $proyecto['id'])
                        @if($estatu['estatus'] == "Por iniciar")
                          <td><span class="label label-warning">{{ $estatu->estatus }}</span></td>
                        @endif
                        @if($estatu['estatus'] == "En ejecucion")
                          <td><span class="label label-primary">{{ $estatu->estatus }}</span></td>
                        @endif
                        @if($estatu['estatus'] == "Cancelado")
                          <td><span class="label label-danger">{{ $estatu->estatus }}</span></td>
                        @endif
                        @if($estatu['estatus'] == "Finalizado")
                          <td><span class="label label-success">{{ $estatu->estatus }}</span></td>
                        @endif
                      @endif
                    @endforeach

                    <td><a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-success btn-flat">Editar</a></td>

                    <td><a href="{{ route('admin.proyectos.destroy', $proyecto->id) }}" onclick="return confirm('¿Esta seguro que desea eliminar el proyecto?')" class="btn btn-success btn-flat">Eliminar</a></td>
                  </tr>
                @endforeach
              </table>
              {!! $proyectos->render() !!}
      			</div>
      		<!-- /.box-body -->
    			</div>
        <!-- /.box -->
        </div>
      </div>
	 </section>
  </body>
@stop