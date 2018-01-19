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
			<?php echo Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5','placeholder' => 'Seleccione una linea de investigacion','required']); ?>

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