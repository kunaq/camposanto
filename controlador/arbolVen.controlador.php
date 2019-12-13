<?php
class ControladorArbolVen{
	static public function ctrMostrarTraArbolVen(){
		$tabla = "rhuma_trabajador";
		$respuesta = ModeloArbolVen::mdlMostrarTraArbolVen($tabla);
		return $respuesta;
	}//function ctrMostrarAnio

	static public function ctrVerDetPeriodo(){
		$tipoPeriodo = $_POST['tipoPeriodo'];
		$anio = $_POST['anio'];
		$tabla = "vtama_periodo";
		$respuesta = ModeloArbolVen::mdlVerDetPeriodo($tabla,$tipoPeriodo,$anio);
		return $respuesta;
	}
}//class ControladorArbolVen
?>