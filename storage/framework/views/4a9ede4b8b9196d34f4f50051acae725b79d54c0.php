<?php $__env->startSection('content'); ?>
	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
    		<div class="col-xs-12">
    			<div class="box">
      			<div class="box-header">
        				<h3 class="box-title">Listado de Investigadores</h3>

              <!--BUSCAR INVESTIGADORES POR CEDULA-->
              <?php echo Form::open(['route' => 'investigadores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']); ?>

                <div class="input-group">
                  <?php echo Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Buscar por cedula', 'aria-describedby' => 'cedula']); ?>

                  <span class="input-group-addon" id="cedula"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
              <?php echo Form::close(); ?>


              <!--BUSCAR INVESTIGADORES POR APELLIDO-->
              <?php echo Form::open(['route' => 'investigadores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']); ?>

                <div class="input-group">
                  <?php echo Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Buscar por apellido', 'aria-describedby' => 'apellido']); ?>

                  <span class="input-group-addon" id="apellido"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
              <?php echo Form::close(); ?>


              <!--BUSCAR INVESTIGADORES POR NOMBRE-->
              <?php echo Form::open(['route' => 'investigadores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']); ?>

                <div class="input-group">
                  <?php echo Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar por nombre', 'aria-describedby' => 'nombre']); ?>

                  <span class="input-group-addon" id="nombre"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
              <?php echo Form::close(); ?>


      			</div>
      			<!-- /.box-header -->
      			<div class="box-body table-responsive no-padding">
      				<table class="table table-hover">
     					 <tr>
        					<th>Nombre</th>
        					<th>Apellido</th>
                  <th>Cedula</th>
                  <th>Sexo</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Linea de investigacion</th>
                  <th>Tipo de investigador</th>
                  <th>Fecha de registro</th>
      				  </tr>
                <?php $__currentLoopData = $investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($investigador->nombre); ?></td>
                    <td><?php echo e($investigador->apellido); ?></td>
                    <td><?php echo e($investigador->cedula); ?></td>
                    <td><?php echo e($investigador->sexo); ?></td>
                    <td><?php echo e($investigador->correo); ?></td>
                    <td><?php echo e($investigador->telefono); ?></td>

                    <?php $__currentLoopData = $lineas_investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea_investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($linea['id'] == $linea_investigador['linea_investigacion_id']): ?>
                      <?php if($investigador['id'] == $linea_investigador['investigador_id']): ?>
                        <td><?php echo e($linea->denominacion); ?></td>
                      <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(empty($linea)== true): ?>
                      <td align="center"><?php echo e("-------"); ?></td>
                    <?php endif; ?>

                    <?php $__currentLoopData = $tipos_investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($investigador['tipo_id'] == $tipo_investigador['tipo_id']): ?>
                        <td><?php echo e($tipo_investigador->tipo_investigador); ?></td>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                    <td><?php echo e($investigador->fecha_registro_investigador); ?></td>

                    <td><a href="<?php echo e(route('investigadores.edit', $investigador->id)); ?>" class="btn btn-success btn-flat">Editar</a></td>

                    <td><a href="<?php echo e(route('admin.investigadores.destroy', $investigador->id)); ?>" onclick="return confirm('¿Esta seguro que desea eliminar el investigador?')" class="btn btn-success btn-flat">Eliminar</a></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
              <?php echo $investigadores->render(); ?>

      			</div>
      		<!-- /.box-body -->
    			</div>
      		<!-- /.box -->
   			</div>
  		</div>
		</section>
	</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>