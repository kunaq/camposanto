<?php
require_once "../../modelo/conexion.php";
   
   $codComisionista = $_POST['cod'];

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT dsc_tipo_comisionista FROM vtama_tipo_comisionista WHERE cod_tipo_comisionista = '$codComisionista'");

	while($key = $db->recorrer($sql)){
    	$dsc_grupo = utf8_encode($key['dsc_grupo']);
	}        
	echo $dsc_grupo;
    $db->liberar($sql);
 	$db->cerrar();  
?>