 <?php
    include ('../config/conexion.php');
    include('../config/variables.php');

	$idAct = $_POST['idAct'];
    $msgErr = '';
    $ban = true;
    $arrSAct = array();
    
    $sqlGetSActs = "SELECT * FROM $tSubAct WHERE actividad_id='$idAct' ";
	
    $resGetSActs = $con->query($sqlGetSActs);
    if($resGetSActs->num_rows > 0){
        while($rowGetSActs = $resGetSActs->fetch_assoc()){
            $id = $rowGetSActs['id'];
            $nombre = $rowGetSActs['nombre'];
            $arrSAct[] = array('id'=>$id, 'nombre'=>$nombre);
        }
    }else{
        $ban = false;
        $msgErr .= 'No hay subactividades.';
    }
    
    if($ban){
        echo json_encode(array("error"=>0, "dataRes"=>$arrSAct, "sql"=>$sqlGetSActs));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr, "sql"=>$sqlGetSActs));
    }
?>