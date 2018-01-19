<?php $__env->startSection('content'); ?>

  <h1>Editar Proyecto</h1><br>

  <div class="form-horizontal">
    <?php echo Form::open(['route' => ['proyectos.update', $proyectos->id], 'method' => 'PUT']); ?>

      <div class="form-group">
        <?php echo Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']); ?>

        <?php echo Form::text('titulo', $proyectos->titulo, ['class' => 'col-sm-5', 'placeholder' => 'nombre del proyecto' ,'required']); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('resumen', 'Resumen', ['class' => 'control-label col-xs-3']); ?>

        <?php echo Form::textarea('resumen', $proyectos->resumen, ['class' => 'col-sm-5', 'placeholder' => '' ,'required']); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('objetivos', 'Objetivos', ['class' => 'control-label col-xs-3']); ?>

        <?php echo Form::textarea('objetivos', $proyectos->objetivos, ['class' => 'col-sm-5', 'placeholder' => 'objetivos del proyecto' ,'required']); ?>     
      </div>

      <div class="form-group">
        <?php echo Form::label('justificacion', 'Justificacion', ['class' => 'control-label col-xs-3']); ?>

        <?php echo Form::textarea('justificacion', $proyectos->justificacion, ['class' => 'col-sm-5', 'placeholder' => 'Justificacion del proyecto' ,'required']); ?>

      </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <label class="radio-inline">
            <b><?php echo e('Seleccione la linea de investigacion a la que pertenece el proyecto'); ?></b><br>
            <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="radio" name="linea_investigacion_id" value= <?php echo $linea['id']; ?> checked><?php echo e($linea['denominacion']); ?><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </label>
        </div>
      </div>

      <?php echo e(Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d"))); ?>  
      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <br>
          <label class="radio-inline">
            <b><?php echo e('Seleccione el tipo de proyecto'); ?></b><br>
            <?php $__currentLoopData = $tipo_proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="radio" name="tipo_proyecto" value= <?php echo $tipo_proyecto['proyecto_tipo_id']; ?> checked><?php echo e($tipo_proyecto['tipo_proyecto']); ?><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <?php echo Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']); ?>

        </div>    
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>