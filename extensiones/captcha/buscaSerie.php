<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT num_serie FROM vtade_control_serie WHERE cod_tipo_comprobante = '$cod' AND flg_activo = 'SI' ORDER BY num_serie");

        $datos = array();
        echo "<option value = 0>Seleccione la serie</option>";
		while($key = $db->recorrer($sql)){
            $datos[] =  $key;
            echo "<option value = ".$key['num_serie'].">".$key['num_serie']."</option>";
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>