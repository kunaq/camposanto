<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";

   $annoPer = $_GET['annoPeriodo'];
   $tipoPer = $_GET['tipoPeriodo'];

   
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_periodo FROM vtama_periodo where num_anno = '$annoPer' and cod_tipo_periodo = '$tipoPer'");

        $datos = array();
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_periodo'].">".$key['cod_periodo']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>