<?php

require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$codPro = $_POST['codPro'];
$linea = $_POST['num_linea'];
$fchContacto = $_POST['fchContacto'];
$calificacion = $_POST['calificacion'];
$presentacion = $_POST['presentacion'];
$consejero = $_POST['consejero'];
$observacion = $_POST['observacion'];
$indicador = $_POST['indicador'];
$usuarioC = $_POST['usuarioC'];


$db = new Conexion();

$sql = $db->consulta("INSERT INTO vtade_prospecto_venta(cod_prospecto, num_linea, fch_contacto, cod_calificacion, flg_presentacion, cod_consejero, dsc_observaciones, fch_registro, cod_usuario_registro, flg_indicador)
VALUES ('$codPro', '$linea', GETDATE(), '$calificacion', '$presentacion', '$consejero', '$observacion', GETDATE(), '$usuarioC', '$indicador');");

$ra = $db->validar($sql);
if ($ra == 1) {
    $arrData = array('cod'=> $ra, 'msg'=>'El prospecto se registro con exito!');
    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
}else{
    $arrData = array('cod'=> $ra, 'msg'=>'Error al ingresar contacto');
    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
}


    	
$db->liberar($sql);
$db->cerrar();

 ?>