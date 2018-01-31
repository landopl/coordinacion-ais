	

<?php $__env->startSection('content'); ?>

	<h1>Asignar investigador a un proyecto</h1>

	<br><br>

	<div class="form-horizontal">
		<?php echo Form::open(['route' =>['investigadoresProyectos.update', $investigador->id], 'method' => 'PUT']); ?>


			<div class="form-group">		
				<?php echo Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('nombre', $investigador->nombre, ['class' => 'col-sm-5', 'required', 'disabled']); ?>

			</div>

			<div class="form-group">		
				<?php echo Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('apellido', $investigador->apellido, ['class' => 'col-sm-5','required', 'disabled']); ?>

			</div>

			<div class="form-group">		
				<?php echo Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('cedula', $investigador->cedula, ['class' => 'col-sm-5','required', 'disabled']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('titulo', 'titulo', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::select('titulo', $proyectos, null, ['class' => 'col-sm-5 proyectos','placeholder' => 'Seleccione un proyecto','required']); ?>

			</div>

			

			                       
			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9"><br>
					<?php echo Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']); ?>

				</div>	
			</div>
		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>

		$('.proyectos').chosen({
			disable_search_threshold: 10
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>