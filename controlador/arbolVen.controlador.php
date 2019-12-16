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
		$tabla2 = 'vtama_tipo_comisionista';
		$respuesta = ModeloArbolVen::mdlVerDetTrabajador($tabla,$tabla2,$codTrabajador);
		return $respuesta;
	}
}//class ControladorArbolVen
?>