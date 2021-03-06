<?php $__env->startSection('content'); ?>

  <h1>Editar Proyecto</h1><br>

  <div class="form-horizontal">
    <?php echo Form::open(['route' => ['proyectos.update', $proyectos->id], 'method' => 'PUT']); ?>

      <div class="form-group">
        <?php echo Form::label('titulo', 'Titulo', ['class' => 'control-label col-xs-3']); ?>

        <?php echo Form::textarea('titulo', $proyectos->titulo, ['class' => 'col-sm-5', 'placeholder' => 'nombre del proyecto' ,'required']); ?>

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
      <?php echo Form::label('denominacion', 'Linea de investigacion', ['class' => 'control-label col-xs-3']); ?>

      <?php echo Form::select('denominacion', $lineas, null, ['class' => 'col-sm-5 select-estilo','placeholder' => 'Seleccione una linea de investigacion','required']); ?>

    </div>

    <?php echo e(Form::hidden('fecha_registro_proyecto', $fecha_registro_proyecto = date("Y-m-d"))); ?>  

    <div class="form-group">
      <?php echo Form::label('tipo_proyecto', 'Tipo de proyecto', ['class' => 'control-label col-xs-3']); ?>

      <?php echo Form::select('tipo_proyecto', $tipo_proyectos, null, ['class' => 'col-sm-5 select-tipo_proyecto','placeholder' => 'Seleccione un tipo de proyecto','required']); ?>

    </div>

      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <?php echo Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']); ?>

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

  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>