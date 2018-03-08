<?php
    include ('../config/conexion.php');
    include('../config/variables.php');
    $dia = $_POST['dia'];

    $msgErr = '';
    $ban = true;
    $arrTareas = array();
    

    $sqlGetTareas = "SELECT $tTarea.nota as nota, $tAct.nombre as act, "
            . "$tSubAct.nombre as subact, $tArea.nombre as area "
            . "FROM $tTarea "
            . "INNER JOIN $tAct ON $tAct.id=$tTarea.actividad_id "
            . "INNER JOIN $tSubAct ON $tSubAct.id=$tTarea.subactividad_id "
            . "INNER JOIN $tArea ON $tArea.id=$tTarea.area_id "
            . "WHERE $tTarea.fecha LIKE '%$dia%'  ";
    $resGetTareas = $con->query($sqlGetTareas);
    if($resGetTareas->num_rows > 0){
        while($rowGetTareas = $resGetTareas->fetch_assoc()){
            $act = $rowGetTareas['act'];
            $subact = $rowGetTareas['subact'];
            $area = $rowGetTareas['area'];
            $nota = $rowGetTareas['nota'];
            $arrTareas[] = array('act'=>$act, 'subact'=>$subact, 
                    'area'=>$area, 'nota'=>$nota);
        }
    }else{
        $ban = false;
        $msgErr .= 'No existen tareas en éste día.'.$con->error;
    }

    
    
    if($ban){
        echo json_encode(array("error"=>0, "dataRes"=>$arrTareas));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr, "sql"=>$sqlGetTareas));
    }
?>