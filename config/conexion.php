<?php
	
	date_default_timezone_set('America/Mexico_City');
	$host="localhost";
	$user="root";
	$pass="";
	$db="ayuntamiento_act";
//	$db="laconcepcionproduccion";
	$con=mysqli_connect($host, $user, $pass, $db);
	if($con->connect_error){
		die("Connection failed: ".$con->connect_error);
	}
	//echo 'Hola';
	
	$tAct = "actividades";
	$tSubAct = "subactividades";
	$tTarea = "tareas";
	$tArea = "areas";
	
	
?>