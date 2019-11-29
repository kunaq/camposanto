<?php
require_once "conexion.php";
class ModeloControlEmpresa{
	/*=============================================
	MOSTRAR CONTROL EMPRESA
	=============================================*/
	static public function mdlMostrarControlEmpresa($bd,$tabla){
		$db = new Conexion($bd);
		$sql = $db->consulta("SELECT cod_ctr_empresa,dsc_razon_social,nom_tabla FROM $tabla WHERE flg_activo = 'SI'");
		$datos = array();
	    while($key = $db->recorrer($sql)){
	    	$datos[] = arrayMapUtf8Encode($key);
		}
		return $datos;
	}//function mdlMostrarControlEmpresa
}//class ModeloControlEmpresa