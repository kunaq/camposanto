<?php
require_once "../../modelo/conexion.php";

   $fechaRes = date($_GET['fechaRes']);

    $db = new Conexion();                                             

    $sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin FROM vtama_periodo where num_anno = 2020");
    // echo  "SELECT num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin FROM vtama_periodo where num_anno = 2020";

    // $datos = array();
    	// $arrData = arrayMapUtf8Encode($db->recorrer($sql));
		// while($key = $db->recorrer($sql)){
  //           $arrData = array('num_anno'=> $key['num_anno'], 'tipo_periodo'=> $key['cod_tipo_periodo'], 'periodo'=> $key['cod_periodo']);        
		// }        
		// echo json_encode($arrData);
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		print_r($datos);
    $db->liberar($sql);
 		$db->cerrar();  
?>