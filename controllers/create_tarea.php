<?php

    include('../config/conexion.php');
    include('../config/variables.php');
    
    $idAct = $_POST['act'];
    $idSAct = $_POST['subact'];
    $idArea = $_POST['area'];
    $nota = (isset($_POST['nota'])) ? $_POST['nota'] : NULL;

    $ban = true;
    $msgErr = '';

	//Añadimos dirección
	$sqlInsertTarea = "INSERT INTO $tTarea (actividad_id, subactividad_id, area_id, nota, fecha) VALUES ('$idAct', '$idSAct', '$idArea', '$nota', '$dateNow $timeNow' )";
	if($con->query($sqlInsertTarea) === TRUE){
		$ban = true;
	}else{
		$msgErr .= 'Error: Al insertar Tarea.'.$con->error;
		$ban = false;
	}
    
    if($ban){
        echo json_encode(array("error"=>0));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr));
    }
    
?>