<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";

   $cod = $_GET['value'];
   $x = $_GET['ejex'];
   $area = $_GET['area'];
   $plat = $_GET['plat'];
   $camps = $_GET['campo'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT distinct cod_espacio, cod_tipo_espacio, cod_estado  FROM vtaca_espacio where cod_camposanto = '$camps' and cod_plataforma = '$plat' and cod_area_plataforma = '$area' and cod_eje_horizontal = '$x' and cod_eje_vertical = '$cod'");

        $datos = array();
    		while($key = $db->recorrer($sql)){
                $datos[] = $key;             
    		}       
    
		echo json_encode($datos);
    $db->liberar($sql);
 		$db->cerrar();  
?>