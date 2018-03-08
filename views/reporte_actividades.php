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
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="reportes.php">Inicio</a></li>
            <li class="active"><a href="reporte_actividades.php">Actividades</a></li>
            <li><a href="reporte_subactividades.php">Subactividades</a></li>
            <li><a href="reporte_areas.php">Áreas</a></li>
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
          <h1 class="page-header">Reporte Actividades</h1>
          <div class="table-responsive">
            <table class="table table-striped" id="data">
              <thead>
				<tr id="headTable">
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
			var totales = new Array();
			$("#fechas").click(function(){
				var diaI = $("#inputDiaInicio").val();
				var diaF = $("#inputDiaFin").val();
				$.ajax({
				   type: "POST",
				   data: {diaI: diaI, diaF: diaF},
				   url: "../controllers/get_actividades_date_range.php",
				   success: function(msg){
					   console.log(msg);
					   var msg = jQuery.parseJSON(msg);
					   if(msg.error == 0){
						   //mostramos los días seleccionados
							$("#data thead #headTable").html("");
							$("#data thead #headTable").append("<th>Actividades</th>");
							$.each(msg.dataDias, function(i, item){
								var newColumn = '<th>'+msg.dataDias[i]+'</th>';
								$(newColumn).appendTo("#data thead #headTable");
							});
							$("#data thead #headTable").append("<th>Total</th>");
							
							
							//rellenamos de ceros
							var numDias = parseInt(msg.numDias);
							for(var a=0; a<=numDias; a++){
								totales[a] = 0;
							}
							
							//Nombre y número de actividades
							$("#data tbody").html("");
							$.each(msg.dataRes, function(j, item2){
								var cadTmp = '';
								var newRow = '<tr>'
									+'<td>'+msg.dataRes[j].nameAct+'</td>';
								cadTmp += newRow;
								$.each(msg.dataRes[j].numActs, function(jj, item22){
									var newRow2 = '<td>'+msg.dataRes[j].numActs[jj].numAct+'</td>';
									cadTmp += newRow2;
									var numTmp = parseInt(msg.dataRes[j].numActs[jj].numAct);
									totales[jj] += numTmp;
								});
								var newRow11 = '<td>'+msg.dataRes[j].totalAct+'</td></tr>';
								cadTmp += newRow11;
								var numTmp2 = parseInt(msg.dataRes[j].totalAct);
								totales[numDias] += numTmp2;
								$(cadTmp).appendTo("#data tbody");
							});
							//Totales
							var newRow = '<tr><td>Totales</td>';
							console.log(totales);
							for(var b=0; b<totales.length; b++){
								newRow += '<td>'+totales[b]+'</td>';
							}
							newRow += '</tr>';
							$(newRow).appendTo("#data tbody");
							
					   }/*else{
						   var newRow = '<tr><td></td><td>'+msg.msgErr+'</td></tr>';
						   $("#data tbody").html(newRow);
					   }*/
				   }
			   });//end ajax
			   
			})
			
		})
	</script>
	
  </body>
</html>
