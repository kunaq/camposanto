<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_subtipo_servicio, dsc_subtipo_servicio FROM vtama_subtipo_servicio WHERE cod_tipo_servicio = '$cod' AND flg_activo = 'SI' ORDER BY dsc_subtipo_servicio");

        $datos = array();
        echo "<option value = 0>Seleccione el subtipo de Servicio</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_subtipo_servicio'].">".$key['dsc_subtipo_servicio']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>