<?php
require_once "../../modelo/conexion.php";
   
   $codGrupo = $_POST['cod'];

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT dsc_grupo FROM vtama_grupo WHERE cod_grupo = '$codGrupo'");

	while($key = $db->recorrer($sql)){
    	$dsc_grupo = Utf8Encode($key['dsc_grupo']);
	}        
	echo $dsc_grupo;
    $db->liberar($sql);
 	$db->cerrar();  
?>