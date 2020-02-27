<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_departamento, dsc_departamento  FROM vtama_departamento where cod_pais = '$cod'");

        $datos = array();
         echo "<option value = 0>Seleccione</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_departamento'].">".$key['dsc_departamento']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>