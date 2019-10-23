<?php 

require_once "../../modelo/conexion.php";


$tipodoc=$_POST["tipodoc"];
$ndoc=$_POST["ndoc"];
// $tipodoc = $_GET['value'];
// $ndoc = $_GET['value'];

$db = new Conexion();                                             

$sql = $db->consulta("SELECT dsc_cliente, dsc_documento, cod_tipo_documento FROM vtama_cliente where cod_tipo_documento='$tipodoc' AND dsc_documento = '$ndoc';");


if ($key = $db->recorrer($sql)) {
	$code = "1";
	$msg = "El tipo y numero de documento ya se encuentra registrado, verifique.";
}else{
	$code = "0";
	$msg = "";
}

$arrData = array('cod'=> $code, 'msg'=>$msg);
echo json_encode($arrData);
 ?>