<?php
class ControladorControlEmpresa{
	/*=============================================
	MOSTRAR CONTROL EMPRESA
	=============================================*/
	static public function ctrMostrarControlEmpresa(){
		$tabla = "scfma_empresa";
		$bd = DB_NAME;
		$respuesta = ModeloControlEmpresa::mdlMostrarControlEmpresa($bd,$tabla);
		return $respuesta;
	}//function ctrMostrarControlEmpresa
	
}//class ControladorControlEmpresa