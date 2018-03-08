<?php
    include ('../config/conexion.php');
    include('../config/variables.php');
    $diaI = $_POST['diaI'];
    $diaF = $_POST['diaF'];

    $msgErr = '';
    $ban = true;
    $arrActs = array();

	//Obtenemos las subactividades
	$arrActsDetails = array();
	$sqlGetActs = "SELECT $tArea.nombre, $tTarea.area_id, COUNT(*) as num "
		."FROM $tTarea "
		."INNER JOIN $tArea ON $tArea.id=$tTarea.area_id "
		."WHERE $tTarea.fecha BETWEEN '$diaI 00:00:00.000000' AND '$diaF 23:59:59.000000' "
		."GROUP BY $tTarea.area_id ";
	$resGetActs = $con->query($sqlGetActs);
	$numSubActs = $resGetActs->num_rows;
	while($rowGetActs = $resGetActs->fetch_assoc()){
		$numAct = $rowGetActs['num'];
		$nameAct = $rowGetActs['nombre'];
		$arrActs[] = array('nameArea'=>$nameAct, 'numArea'=>$numAct);
	}
    
    
    if($ban){
        echo json_encode(array("error"=>0, "dataRes"=>$arrActs, "numSubActs"=>$numSubActs, "sql"=>$sqlGetActs));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr, "sql"=>$sqlGetActs));
    }
?>