<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   
   $codFuneraria = $_POST['cod'];

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT dsc_agencia FROM vtama_agencia_funeraria WHERE cod_agencia = '$codFuneraria'");

	while($key = $db->recorrer($sql)){
    	$dsc_grupo = utf8_encode($key['dsc_agencia']);
	}        
	echo $dsc_grupo;
    $db->liberar($sql);
 	$db->cerrar();  
?>