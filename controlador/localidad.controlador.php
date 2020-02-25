<?php
class ControladorLocalidad{
	/*=============================================
	MOSTRAR LOCALIDAD
	=============================================*/
	static public function ctrMostrarLocalidad($entrada){
		$tabla1 = 'vtama_localidad';
		$respuesta = ModeloLocalidad::mdlMostrarLocalidad($entrada,$tabla1);
		return $respuesta;
	}//function ctrMostrarLocalidad
}//class ControladorLocalidad