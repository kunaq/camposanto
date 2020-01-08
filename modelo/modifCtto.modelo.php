<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtade_contrato.*, $tabla2.dsc_cliente FROM $tabla INNER JOIN $tabla2 ON vtade_contrato.cod_cliente = $tabla2.cod_cliente WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))");
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