<?php $__env->startSection('content'); ?>

	<body class="hold-transition skin-blue sidebar-mini">
		<section class="content">
			<div class="row">
        		<div class="col-xs-12">
          			<div class="box">
            			<div class="box-header">
              				<h3 class="box-title">Lineas de investigacion</h3>
            			</div>
            			<!-- /.box-header -->
            			<div class="box-body table-responsive no-padding">
              			<table class="table table-hover">
               					<tr>
                  				<th>Denominacion</th>
                  				<th>Fecha de aprobacion</th>
                				</tr>
				                <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>  
                            <td><?php echo e($linea->denominacion); ?></td>
                            <td><?php echo e($linea->fecha_aprobacion_linea); ?></td>
                            
                            <td><a href="<?php echo e(route('lineas.edit', $linea->id)); ?>" class="btn btn-success btn-flat">Editar</a></td>

                            <td><a href="<?php echo e(route('admin.lineas.destroy', $linea->id)); ?>" onclick="return confirm('¿Esta seguro que desea eliminar el investigador?')" class="btn btn-success btn-flat">Eliminar</a></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				            </table>
                    <?php echo $lineas->render(); ?>

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