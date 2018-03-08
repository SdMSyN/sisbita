<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema de Bitacora para el Ayuntamiento</title>

    <!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/overwrite.css" rel="stylesheet">
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<!-- validación de formularios -->
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/jquery-validate.bootstrap-tooltip.min.js"></script>
	
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

	<?php
		include('../config/variables.php');
	?>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SisBitA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="reportes.php">Inicio <span class="sr-only">(current)</span></a></li>
            <li><a href="reporte_actividades.php">Actividades</a></li>
            <li><a href="reporte_subactividades.php">Subactividades</a></li>
            <li><a href="reporte_areas.php">Áreas</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Actividades del día <?=$dateNow; ?></h1>
          <div class="table-responsive">
            <table class="table table-striped" id="data">
              <thead>
                <tr>
                  <th>Actividad</th>
                  <th>SubActividad</th>
                  <th>Área</th>
                  <th>Nota</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
			   type: "POST",
			   data: {dia: "<?= $dateNow; ?>"},
			   url: "../controllers/get_tareas_by_day.php",
			   success: function(msg){
				   console.log(msg);
				   $("#data tbody").html(msg);
				   var msg = jQuery.parseJSON(msg);
				   var countExa = 0;
				   if(msg.error == 0){
					   $("#data tbody").html("");
					   $.each(msg.dataRes, function(i, item){
						   var newRow = '<tr>'
								+'<td>'+msg.dataRes[i].act+'</td>'   
								+'<td>'+msg.dataRes[i].subact+'</td>'   
								+'<td>'+msg.dataRes[i].area+'</td>'   
								+'<td>'+msg.dataRes[i].nota+'</td>'
								+'<tr></tr>';
							$(newRow).appendTo("#data tbody");
					   });
				   }else{
					   var newRow = '<tr><td></td><td>'+msg.msgErr+'</td></tr>';
					   $("#data tbody").html(newRow);
				   }
			   }
		   });//end ajax
		})
	</script>
	
  </body>
</html>
