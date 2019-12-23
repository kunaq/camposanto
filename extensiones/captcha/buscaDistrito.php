<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_distrito, dsc_distrito  FROM vtama_distrito where cod_provincia = '$cod'");

        $datos = array();
         echo "<option value = 0>Seleccione</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_distrito'].">".$key['dsc_distrito']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>