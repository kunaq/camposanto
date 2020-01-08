<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$tabla3,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.* FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))");
		// echo "SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.* FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))";
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