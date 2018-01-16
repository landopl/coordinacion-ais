@extends('admin.plantilla.layout')

@section('content')

	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
    		<div class="col-xs-12">
    			<div class="box">
      			<div class="box-header">
        			<h3 class="box-title">Lineas de investigacion</h3>
              
              {!!Form::open(['route' => 'lineas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])!!}
                <div class="input-group">
                  {!!Form::text('denominacion', null, ['class' => 'form-control', 'placeholder' => 'Buscar por nombre', 'aria-describedby' => 'buscar'])!!}
                  <span class="input-group-addon" id="buscar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
              {!!Form::close()!!}
      			</div>
      			<!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
        			<table class="table table-hover">
         					<tr>
            				<th>Denominacion</th>
            				<th>Fecha de aprobacion</th>
          				</tr>
	                @foreach($lineas as $linea)
                    <tr>  
                      <td>{{ $linea->denominacion }}</td>
                      <td>{{ $linea->fecha_aprobacion_linea }}</td>
                      
                      <td><a href="{{ route('lineas.edit', $linea->id) }}" class="btn btn-success btn-flat">Editar</a></td>
                  
                      <!-- route recibe dos parametros, el primero es el nombre de la ruta y el segundo es la variable que se quiere enviar al controlador que en este caso para ser eliminado en el metodo destroy-->

                      <td><a href="{{ route('admin.lineas.destroy', $linea->id) }}" onclick="return confirm('¿Esta seguro que desea eliminar el investigador?')" class="btn btn-success btn-flat">Eliminar</a></td>
                    </tr>
                  @endforeach
	            </table>
              {!! $lineas->render() !!} <!-- Renderizar (render()) es para que se pueda mostrar la paginacion  -->
      			</div>
        	<!-- /.box-body -->
      		</div>
      	<!-- /.box -->
   			</div>
      </div>
		</section>
	</body>
@stop