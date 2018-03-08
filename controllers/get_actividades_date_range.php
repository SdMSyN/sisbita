<?php
    include ('../config/conexion.php');
    include('../config/variables.php');
    $diaI = $_POST['diaI'];
    $diaF = $_POST['diaF'];

    $msgErr = '';
    $ban = true;
    $arrActs = array();
    
	//Calculamos diferencia entre fechas
	$sqlGetDiff="SELECT DATEDIFF('$diaF', '$diaI') as diff ";
	$resGetDiff = $con->query($sqlGetDiff);
	$rowGetDiff = $resGetDiff->fetch_assoc();
	$diasDiff = $rowGetDiff['diff']+1;
	
	//Vamos sumando de uno a uno hasta que sea menor a la fecha limite
	for($i=0; $i<$diasDiff; $i++){
		$sqlAddDate = "SELECT DATE_ADD('$diaI', INTERVAL $i DAY) as diaNuevo ";
		$resAddDate = $con->query($sqlAddDate);
		$rowAddDate = $resAddDate->fetch_assoc();
		$diaNuevo = $rowAddDate['diaNuevo'];
		$arrActs[] = $diaNuevo;
	}

	//Obtenemos las actividades
	$arrActsDetails = array();
	$sqlGetActs = "SELECT * FROM $tAct ";
	$resGetActs = $con->query($sqlGetActs);
	while($rowGetActs = $resGetActs->fetch_assoc()){
		$idAct = $rowGetActs['id'];
		$nameAct = $rowGetActs['nombre'];
		$arrTmpActNum = array();
		$sumNumAct = 0;
		foreach($arrActs as $dias){
			$sqlGetActByDay = "SELECT COUNT(*) as numAct FROM $tTarea WHERE fecha LIKE '%$dias%' AND actividad_id='$idAct' ";
			$resGetActByDay = $con->query($sqlGetActByDay);
			$rowGetActByDay = $resGetActByDay->fetch_assoc();
			$numAct = $rowGetActByDay['numAct'];
			$arrTmpActNum[] = array('numAct'=>$numAct);
			$sumNumAct += $numAct;
		}
		$arrActsDetails[] = array('nameAct'=>$nameAct, 'numActs'=>$arrTmpActNum, 'totalAct'=>$sumNumAct);
	}
    
    
    if($ban){
        echo json_encode(array("error"=>0, "dataRes"=>$arrActsDetails, "dataDias"=>$arrActs, "numDias"=>$diasDiff));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr, "sql"=>$sqlGetTareas));
    }
?>