<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
   $cod1 = explode('/', $cod);
     $aux = $cod1[0];
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT dsc_tipo_espacio FROM  vtama_tipo_espacio WHERE cod_tipo_espacio  = '$aux'");

        $datos = array();
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo $respuesta =  $key['dsc_tipo_espacio'];
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>