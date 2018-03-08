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
		include('../config/conexion.php');
		include('../config/variables.php');
		//Obtenemos el # de subactividades
		$sqlGetSubAct = "SELECT id FROM $tSubAct ";
		$resGetSubAct = $con->query($sqlGetSubAct);
		$numSubAct = $resGetSubAct->num_rows;
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
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="reportes.php">Inicio</a></li>
            <li><a href="reporte_actividades.php">Actividades</a></li>
            <li><a href="reporte_subactividades.php">Subactividades</a></li>
            <li class="active"><a href="reporte_areas.php">Áreas</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="inputDiaInicio" class="col-sm-2 control-label" >Día Inicio</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="inputDiaInicio" name="inputDiaInicio" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputDiaFin" class="col-sm-2 control-label" >Día Inicio</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="inputDiaFin" name="inputDiaFin" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-primary" id="fechas">Ver Resultados</button>
					</div>
				</div>
			</form>
          <h1 class="page-header">Reporte Áreas</h1>
          <div class="table-responsive">
            <table class="table table-striped" id="data">
              <thead>
				<tr>
					<th>Área</th>
					<th>Cantidad</th>
				</tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
		  <div class="row">
			<div id="chart_pie_div" ></div>
		  </div>
        </div>
      </div>
    </div>

	<!-- gráficas -->
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" async>
      function drawChartsGogole(){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
      }

      function drawChart() {
		  var data = new google.visualization.DataTable();
		  data.addColumn('string', 'Nombre');
		  data.addColumn('number', 'Numero');
		  for(var i = 0; i<totales.length; i++){
			  data.addRows( [ [nombres[i], totales[i]] ] );
		  }
					
			/*var view = new google.visualization.DataView(data);
			    view.setColumns([0, 1,
							   { calc: "stringify",
								 sourceColumn: 1,
								 type: "string",
								 role: "annotation" }
							   ]);*/
							   
		  var options = {
			title: "Áreas",
			width: 1200,
			height: 800,
			pieSliceText: 'percentage'
		  };
		  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_pie_div'));
        //chart.draw(view, options);
        chart.draw(data, options);
      }
      
    </script>
	
	<script type="text/javascript">
		var nombres = new Array();
		var totales = new Array();
		$(document).ready(function(){
			$("#fechas").click(function(){
				var diaI = $("#inputDiaInicio").val();
				var diaF = $("#inputDiaFin").val();
				$.ajax({
				   type: "POST",
				   data: {diaI: diaI, diaF: diaF},
				   url: "../controllers/get_areas_date_range.php",
				   success: function(msg){
					   console.log(msg);
					   var msg = jQuery.parseJSON(msg);
					   if(msg.error == 0){
							//rellenamos de ceros
							for(var a=0; a< parseInt(msg.numSubActs); a++){
								totales[a] = 0;
							}
							var suma = 0;
							//Nombre y número de actividades
							$("#data tbody").html("");
							$.each(msg.dataRes, function(i, item){
								var newRow = '<tr>'
									+'<td>'+msg.dataRes[i].nameArea+'</td>'
									+'<td>'+msg.dataRes[i].numArea+'</td>'
									+'</tr>';
								$(newRow).appendTo("#data tbody");
								suma += parseInt(+msg.dataRes[i].numArea);
								nombres[i] = msg.dataRes[i].nameArea;
								totales[i] = parseInt(msg.dataRes[i].numArea);
							});
							//Totales
							var newRow = '<tr><td>Totales</td>';
								newRow += '<td>'+suma+'</td>';
							newRow += '</tr>';
							$(newRow).appendTo("#data tbody");
							
					   }else{
						   var newRow = '<tr><td></td><td>'+msg.msgErr+'</td></tr>';
						   $("#data tbody").html(newRow);
					   }
					   setTimeout(drawChartsGogole(), 2000);
				   }
			   });//end ajax
			   
			})
			
		})
	</script>
	
  </body>
</html>
