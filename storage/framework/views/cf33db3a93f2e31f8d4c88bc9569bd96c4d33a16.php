<?php $__env->startSection('content'); ?>

	<h1>Registrar Investigador En un Proyecto</h1>

	<br><br>

	<div class="form-horizontal">
		<?php echo Form::open(['route' => 'investigadoresProyectos.store', 'method' => 'POST']); ?>


		<div class="form-group">
			
			<?php echo Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::select('cedula', $investigadores, null, ['class' => 'col-sm-5', 'required']); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('titulo', 'Titulo del proyecto', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::select('titulo', $proyecto, null, ['class' => 'col-sm-5 select-coordinador','placeholder' => 'Seleccione un proyecto','required']); ?>

		</div>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9"><br>
				<?php echo Form::submit('Registrar', ['class' => 'btn btn-success btn-flat']); ?>

			</div>
		</div>
		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>
		$('.select-coordinador').chosen({
			
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>