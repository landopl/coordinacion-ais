<?php $__env->startSection('content'); ?>

	<?php $__currentLoopData = $lineas_investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea_investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($investigador->id != $linea_investigador->investigador_id): ?>

			<?php $__env->startSection('h1', 'Asignar nueva linea de investigacion'); ?>

			<div class="form-horizontal">
				<?php echo Form::open(['route' =>['AsignarLineasInvestigadores.update', $investigador->id], 'method' => 'PUT']); ?>


					<div class="form-group">		
						<?php echo Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']); ?>

						<?php echo Form::text('nombre', $investigador->nombre, ['class' => 'col-sm-5', 'disabled']); ?>

					</div>

					<div class="form-group">		
						<?php echo Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']); ?>

						<?php echo Form::text('apellido', $investigador->apellido, ['class' => 'col-sm-5','disabled']); ?>

					</div>

					<div class="form-group">		
						<?php echo Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']); ?>

						<?php echo Form::text('cedula', $investigador->cedula, ['class' => 'col-sm-5','disabled']); ?>

					</div>


					
							<div class="form-group">
							<?php echo Form::label('linea_investigacion_id', 'Linea de investigacion', ['class' => 'control-label col-xs-3']); ?>

							<?php echo Form::select('linea_investigacion_id', $lineas, null, ['class' => 'col-sm-5 select-denominacion','placeholder' => 'Seleccione una linea de investigacion','required']); ?>

							</div>
						

					
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9"><br>
							<?php echo Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']); ?>

						</div>	
					</div>
				<?php echo Form::close(); ?>

			</div>
		<?php else: ?>
			<?php echo redirect()->route('investigadores.show', $investigador->id); ?>

		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<script>
		$('.select-denominacion').chosen({
			
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>