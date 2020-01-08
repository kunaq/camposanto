<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT * FROM $tabla where cod_contrato LIKE '%$codCtto%'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCttos

}//class ModeloModifCtto
?>