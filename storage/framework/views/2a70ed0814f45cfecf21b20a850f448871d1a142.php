<?php $__env->startSection('content'); ?>

	<?php $__env->startSection('h1','Registrar Linea de Investigacion'); ?>

	<br><br>

	<div class="form-horizontal">
		<?php echo Form::open(['route' => 'lineas.store', 'method' => 'POST']); ?>


		<div class="form-group">
			
			<?php echo Form::label('denominacion', 'Denominacion', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::text('denominacion', null, ['class' => 'col-sm-5', 'placeholder' => 'nombre de la linea de investigacion' ,'required']); ?>

		</div>

		<div class="form-group">
			
			<?php echo Form::label('fecha_aprobacion_linea', 'Fecha de aprobacion', ['class' => 'control-label col-xs-3']); ?>

			<?php echo Form::date('fecha_aprobacion_linea', null, ['class' => 'col-sm-5','required']); ?>

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