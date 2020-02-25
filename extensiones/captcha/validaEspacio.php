<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT flg_valida_espacio, flg_nuevo_ctt, flg_integral, cod_tipo_necesidad FROM vtama_tipo_recaudacion WHERE cod_tipo_recaudacion = '$cod'");

        $datos = array();
		while($key = $db->recorrer($sql)){
            $datos[] =  $key;
            $respuesta = $key['flg_valida_espacio']."/".$key['flg_nuevo_ctt']."/".$key['flg_integral']."/".$key['cod_tipo_necesidad'];
             
		}        
		echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>