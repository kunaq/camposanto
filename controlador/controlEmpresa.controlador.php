<?php
class ControladorControlEmpresa{
	/*=============================================
	MOSTRAR CONTROL EMPRESA
	=============================================*/
	static public function ctrMostrarControlEmpresa(){
		$tabla = "pr00_tab0000";
		$bd = DB_NAME;
		$respuesta = ModeloControlEmpresa::mdlMostrarControlEmpresa($bd,$tabla);
		return $respuesta;
	}//function ctrMostrarControlEmpresa
}//class ControladorControlEmpresa