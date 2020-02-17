<?php
require_once "../../modelo/conexion.php";

   $fechaRes = date($_GET['fechaRes']);

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo FROM vtama_periodo where fch_inicio <= convert(date,'$fechaRes',121) AND fch_fin >=convert(date,'$fechaRes',121)");

    // $datos = array();

		while($key = $db->recorrer($sql)){
            $arrData = array('num_anno'=> $key['num_anno'], 'tipo_periodo'=> $key['cod_tipo_periodo'], 'periodo'=> $key['cod_periodo']);        
		}        
		echo json_encode($arrData);
    $db->liberar($sql);
 		$db->cerrar();  
?>