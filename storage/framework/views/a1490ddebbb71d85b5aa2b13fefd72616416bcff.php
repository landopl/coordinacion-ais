<?php $__env->startSection('content'); ?>
	<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['fecha', 'id'],
          <?php $__currentLoopData = $investigadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          	['<?php echo e($investigador); ?>'],
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.plantilla.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>