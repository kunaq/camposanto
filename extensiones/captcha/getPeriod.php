<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";

   $fechaRes = date($_GET['fechaRes']);

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo FROM vtama_periodo where fch_inicio <= CONVERT(DATE,'$fechaRes') AND fch_fin >=CONVERT(DATE,'$fechaRes')");

    // $datos = array();

		while($key = $db->recorrer($sql)){
            $arrData = array('num_anno'=> $key['num_anno'], 'tipo_periodo'=> $key['cod_tipo_periodo'], 'periodo'=> $key['cod_periodo']);        
		}        
		echo json_encode($arrData);
    $db->liberar($sql);
 		$db->cerrar();  
?>