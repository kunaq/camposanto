<?php
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT dsc_apellido_paterno, dsc_apellido_materno, dsc_nombres FROM rhuma_trabajador where cod_trabajador = '$cod'");

        $datos = array();

		while($key = $db->recorrer($sql)){
            $datos[] =  $key;
            $respuesta = utf8_encode($key['dsc_nombres']).' '.utf8_encode($key['dsc_apellido_paterno']).' '.utf8_encode($key['dsc_apellido_materno']);    
             
		}    
		//print_r($db);     
		echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();

        //return $respuesta;

    
?>