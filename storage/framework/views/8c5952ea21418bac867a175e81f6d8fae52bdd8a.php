<?php $__env->startSection('content'); ?>

	<h1>Editar Investigadores</h1>

	<br><br>

	<div class="form-horizontal">
		<?php echo Form::open(['route' =>['investigadores.update', $investigadores->id], 'method' => 'PUT']); ?>


			<div class="form-group">		
				<?php echo Form::label('nombre', 'Nombre', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('nombre', $investigadores->nombre, ['class' => 'col-sm-5', 'required']); ?>

			</div>

			<div class="form-group">		
				<?php echo Form::label('apellido', 'Apellido', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('apellido', $investigadores->apellido, ['class' => 'col-sm-5','required']); ?>

			</div>

			<div class="form-group">		
				<?php echo Form::label('cedula', 'Cedula', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('cedula', $investigadores->cedula, ['class' => 'col-sm-5','required']); ?>

			</div>

			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9">
					<label class="radio-inline">
						<b><?php echo e('Sexo'); ?></b><br>
						<input type="radio" name="sexo" value= "femenino" checked>Femenino<br>
						<input type="radio" name="sexo" value= "masculino" checked>Masculino<br>
					</label>
				</div>
			</div>

			<div class="form-group">		
				<?php echo Form::label('correo', 'Correo', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::email('correo', $investigadores->correo, ['class' => 'col-sm-5','required']); ?>

			</div>

			<div class="form-group">	
				<?php echo Form::label('telefono', 'Telefono', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::text('telefono', $investigadores->telefono, ['class' => 'col-sm-5','required']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5 select-denominacion','placeholder' => 'Seleccione una linea de investigacion','required']); ?>

			</div>

			<div class="form-group">
				<?php echo Form::label('tipo_investigador', 'Tipo de investigador', ['class' => 'control-label col-xs-3']); ?>

				<?php echo Form::select('tipo_investigador', $tipos_investigadores, null, ['class' => 'col-sm-5 select-tipo_investigador','placeholder' => 'Seleccione un tipo de investigador','required']); ?>

			</div>

			<?php echo e(Form::hidden('fecha_registro_investigador', $fecha_registro_investigador = date("Y-m-d"))); ?>                       
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
		$('.select-denominacion').chosen({
			
		});

		$('.select-tipo_investigador').chosen({
			disable_search_threshold: 10
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>