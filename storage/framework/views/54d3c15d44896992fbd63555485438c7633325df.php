<?php $__env->startSection('content'); ?>

	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
        		<div class="col-xs-12">
          			<div class="box">
            			<div class="box-header">
              			<h3 class="box-title">Coordinadores</h3>

                    <?php echo Form::open(['route' => 'coordinadores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']); ?>

                      <div class="input-group">
                        <?php echo Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Buscar por cedula', 'aria-describedby' => 'buscar']); ?>

                        <span class="input-group-addon" id="buscar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                      </div>
                    <?php echo Form::close(); ?>

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
			                <?php $__currentLoopData = $coordinadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordinador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                          <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($coordinador['linea_investigacion_id'] == $linea['id']): ?>
                              <td><?php echo e($linea->denominacion); ?></td>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php $__currentLoopData = $investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                            <?php if($coordinador['investigador_id'] == $investigador['id']): ?>     
                              <td><?php echo e($investigador->nombre); ?></td>
                              <td><?php echo e($investigador->nombre); ?></td>
                              <td><?php echo e($investigador->apellido); ?></td>
                              <td><?php echo e($investigador->cedula); ?></td>
                              <td><?php echo e($investigador->sexo); ?></td>
                              <td><?php echo e($investigador->correo); ?></td>
                              <td><?php echo e($investigador->telefono); ?></td>     
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php $__currentLoopData = $tipos_investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($investigador['tipo_id'] == $tipo_investigador['tipo_id']): ?>
                              <td><?php echo e($tipo_investigador->tipo_investigador); ?></td>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <td><?php echo e($investigador->fecha_registro_investigador); ?></td>

                          

                          <td><a href="<?php echo e(route('admin.coordinadores.destroy', $coordinador->id)); ?>" onclick="return confirm('¿Esta seguro que desea eliminar el investigador?')" class="btn btn-success btn-flat">Eliminar</a></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				            </table>
                    <?php echo $coordinadores->render(); ?>

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