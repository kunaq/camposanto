<?php
require_once "../../modelo/conexion.php";
$cod = $_GET['cod'];
$db = new Conexion();

$sql = $db->consulta("SELECT  vtama_tipo_servicio.flg_afecto_igv FROM vtama_servicio INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio WHERE vtama_servicio.cod_servicio = '$cod'");

	$datos = array();

	while($key = $db->recorrer($sql)){
        $datos[] =  $key;
        $respuesta = $key['flg_afecto_igv'];
    }

return $respuesta;
$db->liberar($sql);
$db->cerrar();
?>