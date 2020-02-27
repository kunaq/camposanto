<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
$cod = $_POST['cod'];
$db = new Conexion();

$sql = $db->consulta("SELECT  vtama_tipo_servicio.flg_sadicional FROM vtama_servicio INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio  WHERE vtama_servicio.cod_servicio = '$cod'");

	$datos = array();

	while($key = $db->recorrer($sql)){
        $datos[] =  $key;
        $respuesta = $key['flg_sadicional'];
    }
echo $respuesta;
$db->liberar($sql);
$db->cerrar();
?>