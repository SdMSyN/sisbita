<!DOCTYPE html>
<html>
   <head>
      <title>Sistema de Bitacora para el Ayuntamiento</title>
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
      <link rel="stylesheet" type="text/css" href="../css/animate.css">
      <link rel="shortcut icon" href="img/fav.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" />
      <meta name="keywords" content=" "/>
      <meta name="author" content="Shrinath Nayak">
      <meta name="robots" content="index, follow" />
	  
	  <!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/overwrite.css" rel="stylesheet">
		
		<!-- jQuery -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- validación de formularios -->
		<script src="../js/jquery.validate.min.js"></script>
		<script src="../js/jquery-validate.bootstrap-tooltip.min.js"></script>
		
		<?php 
			include('../config/conexion.php');
			
			//obtenemos las actividades principales
			$optActs = '<option></option>';
			$sqlGetActs = "SELECT * FROM $tAct ";
			$resGetActs = $con->query($sqlGetActs);
			while($rowGetActs = $resGetActs->fetch_assoc()){
				$optActs .= '<option value="'.$rowGetActs['id'].'">'.$rowGetActs['nombre'].'</option>';
			}
			
			//obtenemos las áreas
			$optAreas = '<option></option>';
			$sqlGetAreas = "SELECT * FROM $tArea ORDER BY nombre ASC";
			$resGetAreas = $con->query($sqlGetAreas);
			while($rowGetAreas = $resGetAreas->fetch_assoc()){
				$optAreas .= '<option value="'.$rowGetAreas['id'].'">'.$rowGetAreas['nombre'].'</option>';
			}
		
		?>
   </head>
   <body>
      <!--Card-->
      <div class="card animated fadeIn">
         <center><img class="center animated rollIn" src="../img/totolac.png" alt="avatar"></center>
         <hr>
         <div class="name">
            SisBitA
         </div>
		 
		<div class="content"> 
			<form id="formAddAct" name="formAddAct">
				<p class="msgModal"></p>
				<div class="form-group">
					<label for="act">Actividad:</label>
					<select class="form-control" id="act" name="act"><?= $optActs; ?></select>
				</div>
				<div class="form-group">
					<label for="subact">Sub-Actividad:</label>
					<select class="form-control" id="subact" name="subact"></select>
				</div>
				<div class="form-group">
					<label for="act">Área:</label>
					<select class="form-control" id="area" name="area"><?= $optAreas; ?></select>
				</div>
				<div class="form-group">
					<label for="nota">Nota:</label>
					<textarea class="form-control" id="nota" name="nota"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Cargar</button>
				<a href="reportes.php" class="btn btn-danger">Reportes</a>
			</form>
		</div>
		
		<!-- 
         <p class="icons animated pulse">
            <a href="https://twitter.com/shrinath_nayak" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
            </span>
            </a>
            <a href="https://www.facebook.com/Abhi.Nayak07" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-3x fa-stack-2x"></i>     
                <i class="fa fa-facebook fa-stack-1x"></i>
            </span>
            </a>
            <a href="https://plus.google.com/u/0/112966876017615905321" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-google-plus fa-stack-1x"></i>
            </span>
            </a>
            <a href="https://www.instagram.com/abhijeet_n7/" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-instagram fa-stack-1x"></i>
            </span>
            </a>
            <a href="https://github.com/shrinathnayak07" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-github fa-stack-1x"></i>
            </span>
            </a>
         </p>
		 -->
      </div>
      <!--footer-->
      <footer class="animated fadeIn">
         &copy; Julio, 2017. Ing. Luigi Pérez Calzada
      </footer>
	  
		<script type="text/javascript">
			$(document).ready(function(){
				$("#act").change(function(){
					var idAct = $(this).val();
					console.log(idAct);
					$.ajax({
						type: 'POST',
						data: {idAct: idAct},
						url: "../controllers/proc_get_subacts.php",
						success: function(msg){
							$("#subact").html("");
							console.log(msg);
							var msg = jQuery.parseJSON(msg);
							console.log(msg);
							if(msg.error == 0){
								$.each(msg.dataRes, function(i, item){
									var newOpt = '<option value="'+msg.dataRes[i].id+'">'+msg.dataRes[i].nombre+'</option>';
									$("#subact").append(newOpt);
								});
							}else{
								$("#subact").html("No existen sub actividades");
							}
						}
					})
				});
				
				$('#formAddAct').validate({
                rules: {
                    act: {required: true},
                    subact: {required: true},
                    area: {required: true}
                },
                messages: {
					act: "Campo obligatorio",
					subact: "Campo obligatorio",
					area: "Campo obligatorio"
                },
                tooltip_options: {
                    act: {trigger: "focus", placement: "bottom"},
                    area: {trigger: "focus", placement: "bottom"},
                    subact: {trigger: "focus", placement: "bottom"}
                },
                submitHandler: function(form){
                    $('#loading').show();
                    $.ajax({
                        type: "POST",
                        url: "../controllers/create_tarea.php",
                        data: $('form#formAddAct').serialize(),
                        success: function(msg){
                            console.log(msg);
                            var msg = jQuery.parseJSON(msg);
                            if(msg.error == 0){
                                setTimeout(function () {
                                  location.href =  'index.php';
                                }, 1500);
                            }else{
                                $('.msgModal').css({color: "#FF0000"});
                                $('.msgModal').html(msg.msgErr);
                            }
                        }, error: function(){
                            alert("Error al añadir tarea");
                        }
                    });
                }
            }); // end añadir nueva tarea
			
			});
		</script>
   </body>
</html>
