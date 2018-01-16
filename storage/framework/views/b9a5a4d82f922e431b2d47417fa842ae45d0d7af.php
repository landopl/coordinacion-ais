<?php $__env->startSection('content'); ?>

	<h1>Registrar Coordinador</h1>

	<br><br>

	<div class="form-horizontal">
		<?php echo Form::open(['route' => 'coordinadores.store', 'method' => 'POST']); ?>


		<div class="form-group">
			
			<?php echo Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::text('cedula', null, ['class' => 'col-sm-5', 'required']); ?>

		</div>

			<div class="form-group">

			<select class="col-xs-offset-3" name="linea">
			<option>Seleccione la linea de investigacion</option>
				<?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($linea->id); ?>"><?php echo e($linea->denominacion); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>	
		</div>

		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9"><br>
				<?php echo Form::submit('Registrar', ['class' => 'btn btn-success btn-flat']); ?>

			</div>
		</div>
		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>