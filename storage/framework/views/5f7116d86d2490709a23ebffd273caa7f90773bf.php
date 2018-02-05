



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

		<?php $__currentLoopData = $investigadores_proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigador_proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		   		<?php if($investigador_proyecto['proyecto_id'] == $proyecto['id']): ?>

		   			<tr>    
	                        <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                          <?php if($linea['id'] == $proyecto['linea_investigacion_id']): ?>
	                            <td><?php echo e($linea->denominacion); ?></td>
	                          <?php endif; ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                        <?php $__currentLoopData = $proyectos_nombre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto_nombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
	                          <?php $__currentLoopData = $proyectos_tipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto_tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                            <?php if($proyecto_tipo['proyecto_id'] == $proyecto['id']): ?>
	                              <?php if($proyecto_tipo['proyecto_tipo_id'] == $proyecto_nombre['proyecto_tipo_id']): ?>
	                                <td><?php echo e($proyecto_nombre->tipo_proyecto); ?></td>
	                              <?php endif; ?>
	                            <?php endif; ?>
	                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                        <?php $__currentLoopData = $fechas_registro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha_registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                          <?php if($fecha_registro['proyecto_id'] == $proyecto['id']): ?>
	                            <td><?php echo e($fecha_registro->fecha_registro_proyecto); ?></td>
	                          <?php endif; ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                        <?php $__currentLoopData = $fechas_inicio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha_inicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                            <?php if(empty($fecha_inicio)== false): ?>
	                              <?php if($fecha_inicio['proyecto_id'] == $proyecto['id']): ?>
	                                <td><?php echo e($fecha_inicio->fecha_inicio_proyecto); ?></td>
	                              <?php endif; ?>
	                            <?php endif; ?> 
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                        <?php if(empty($fecha_inicio)== true): ?>
	                          <td><?php echo e("---.--.--"); ?></td>
	                        <?php endif; ?>

	                        <?php $__currentLoopData = $fechas_culminacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha_culminacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                          <?php if(empty($fechas_culminacion)== false): ?>
	                            <?php if($fecha_culminacion['proyecto_id'] == $proyecto['id']): ?>
	                              <td><?php echo e($fecha_culminacion->fecha_culminacion_proyecto); ?></td>
	                            <?php endif; ?>
	                          <?php endif; ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                        <?php if(empty($fecha_culminacion)== true): ?>
	                          <td><?php echo e("---.--.--"); ?></td>
	                        <?php endif; ?>

	                        <?php $__currentLoopData = $estatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                          <?php if($estatu['proyecto_id'] == $proyecto['id']): ?>
	                            <?php if($estatu['estatus'] == "Por iniciar"): ?>
	                              <td><span class="label label-warning"><?php echo e($estatu->estatus); ?></span></td>
	                            <?php endif; ?>
	                            <?php if($estatu['estatus'] == "En ejecucion"): ?>
	                              <td><span class="label label-primary"><?php echo e($estatu->estatus); ?></span></td>
	                            <?php endif; ?>
	                            <?php if($estatu['estatus'] == "Cancelado"): ?>
	                              <td><span class="label label-danger"><?php echo e($estatu->estatus); ?></span></td>
	                            <?php endif; ?>
	                            <?php if($estatu['estatus'] == "Finalizado"): ?>
	                              <td><span class="label label-success"><?php echo e($estatu->estatus); ?></span></td>
	                            <?php endif; ?>
	                          <?php endif; ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                      </tr>
		   		<?php endif; ?>
		   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</table>