<?php
class ControladorArbolVen{
	static public function ctrMostrarTraArbolVen(){
		$tabla = "rhuma_trabajador";
		$respuesta = ModeloArbolVen::mdlMostrarTraArbolVen($tabla);
		return $respuesta;
	}//function ctrMostrarAnio

	static public function ctrVerDetTrabajador(){
		$codTrabajador = $_POST['codTrabajador'];
		$tabla = "vtama_historico_vendedor";
		$respuesta = ModeloArbolVen::mdlVerDetTrabajador($tabla,$codTrabajador);
		return $respuesta;
	}
}//class ControladorArbolVen
?>