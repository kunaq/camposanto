<?php 
require_once "../../core.php";
require_once "../../modelo/conexion.php";

$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];

$db = new Conexion();

$sql = $db->consulta("SELECT cod_estado FROM vtaca_prospecto_venta WHERE cod_tipo_documento = '$tipoDoc' AND dsc_documento = '$numDoc';");

// $estado = "";

if ($rows = $db->rows($sql)) {
     
    while($key = $db->recorrer($sql)){

        if ($key['cod_estado'] == "ACT") {
            $estado = "activo";
        }elseif ($key['cod_estado'] == "VTA") {
            $estado = "cierre";
        }elseif ($key['cod_estado'] == "CAD") {
            $estado = "caduco";
        }elseif($key['cod_estado'] == "TRU"){
            $estado = "trunco";
        }
    }

    $code = "1";

	$arrData = array('cod'=> $code, 'estado'=>$estado);
	echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

    $db->liberar($sql);
    $db->cerrar();

}else{
	$code = "0";
	$arrData = array('cod'=> $code);
	echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
}


 ?>