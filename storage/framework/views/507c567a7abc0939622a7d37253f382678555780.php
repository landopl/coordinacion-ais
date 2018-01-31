<?php $__env->startSection('content'); ?>

	<?php $__env->startSection('h1','Registrar Proyecto'); ?>

	<div class="form-horizontal">
		<?php echo Form::open(['route' => 'proyectos.store', 'method' => 'POST']); ?>

		
		<div class="form-group">
			<?php echo Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::textarea('titulo', null, ['class' => 'col-sm-5 trumbowyg-textarea', 'placeholder' => 'nombre del proyecto' ,'required']); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('resumen', 'Resumen', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::textarea('resumen', null, ['class' => 'col-sm-5', 'placeholder' => 'Resumen' ,'required']); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('objetivos', 'Objetivos', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::textarea('objetivos', null, ['class' => 'col-sm-5', 'placeholder' => 'objetivos del proyecto' ,'required']); ?>			
		</div>

		<div class="form-group">
			
			<?php echo Form::label('justificacion', 'Justificacion', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::textarea('justificacion', null, ['class' => 'col-sm-5', 'placeholder' => 'Justificacion del proyecto' ,'required']); ?>

		</div>

		<div class="form-group">
			<select class="col-xs-offset-3" name="linea_investigacion_id">
				<option>Seleccione la linea de investigacion</option>
					<?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($linea->id); ?>"><?php echo e($linea->denominacion); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			
		</div>

		<?php echo e(Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d"))); ?>  

		<div class="form-group">
			<select class="col-xs-offset-3" name="tipo_proyecto">
				<option>Seleccione el tipo de proyecto</option>
					<?php $__currentLoopData = $tipo_proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($tipo_proyecto->proyecto_tipo_id); ?>"><?php echo e($tipo_proyecto->tipo_proyecto); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			
		</div>

		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9">
				<?php echo Form::submit('Registrar', ['class' => 'btn btn-success btn-flat']); ?>

			</div>
			
		</div>

	<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>
		$('.select-estilo').chosen({
			
		});
		$('.select-tipo_proyecto').chosen({
			disable_search_threshold: 10
		});

		$('.trumbowyg-textarea').trumbowyg();

	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>