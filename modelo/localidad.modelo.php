<?php
require_once "conexion.php";
class ModeloLocalidad{
	/*=============================================
	MOSTRAR LOCALIDAD
	=============================================*/
	static public function mdlMostrarLocalidad($entrada,$tabla1){
		$db = new Conexion();
		if($entrada == 'sessionLocal'){
			$sql1 = $db->consulta("SELECT $tabla1.cod_localidad,$tabla1.dsc_localidad FROM $tabla1");
			$datos = arrayMapUtf8Encode($db->recorrer($sql1));
			$db->liberar($sql1);
		}
		return $datos;
        $db->cerrar();
	}//function mdlMostrarLocalidad
}//class ModeloLocalidad