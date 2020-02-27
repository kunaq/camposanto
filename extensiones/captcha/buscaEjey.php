<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   $area = $_GET['area'];
   $plat = $_GET['plat'];
   $camps = $_GET['campo'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT distinct cod_eje_vertical  FROM vtaca_espacio where cod_camposanto = '$camps' and cod_plataforma = '$plat' and cod_area_plataforma = '$area' and cod_eje_horizontal = '$cod'");

        $datos = array();
        echo "<option value = 0>Eje Ver.</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_eje_vertical'].">".$key['cod_eje_vertical']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>