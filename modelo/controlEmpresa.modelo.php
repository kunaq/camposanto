<?php
require_once "conexion.php";
class ModeloControlEmpresa{
	/*=============================================
	MOSTRAR CONTROL EMPRESA
	=============================================*/
	static public function mdlMostrarControlEmpresa($bd,$tabla){
		$db = new Conexion($bd);
		$sql = $db->consulta("SELECT cod_empresa,dsc_empresa,dsc_database FROM $tabla WHERE flg_activo = 'SI' AND dsc_database LIKE '%BE%'");
		$datos = array();
	    while($key = $db->recorrer($sql)){
	    	$datos[] = arrayMapUtf8Encode($key);
		}
		return $datos;
	}//function mdlMostrarControlEmpresa
}//class ModeloControlEmpresa