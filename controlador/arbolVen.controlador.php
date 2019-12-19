<?php
class ControladorArbolVen{
	static public function ctrMostrarTraArbolVen(){
		$tabla = "rhuma_trabajador";
		$respuesta = ModeloArbolVen::mdlMostrarTraArbolVen($tabla);
		return $respuesta;
	}//function ctrMostrarTraArbolVen

	static public function ctrVerDetTrabajador(){
		$codTrabajador = $_POST['codTrabajador'];
		$tabla = "vtama_historico_vendedor";
		$tabla2 = 'vtama_tipo_comisionista';
		$tabla3 = 'vtama_grupo';
		$respuesta = ModeloArbolVen::mdlVerDetTrabajador($tabla,$tabla2,$tabla3,$codTrabajador);
		return $respuesta;
	}//function ctrVerDetTrabajador(

	static public function ctrNombreTrabajador(){
		$tabla = "rhuma_trabajador";
		$codigo = $_POST['codTrabajador'];
		$respuesta = ModeloArbolVen::mdlNombreTrabajador($tabla,$codigo);
		return $respuesta;
	}//function ctrNombreTrabajador
	static public function ctrBuscarCtto(){
		$tabla = "vtade_contrato";
		$tabla2 = "vtama_localidad";
		$codigo = $_POST['codTrabajador'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipoPeriodo'];
		$annio = $_POST['annio'];
		$respuesta = ModeloArbolVen::mdlBuscarCtto($tabla,$tabla2,$codigo,$periodo,$tipoPeriodo,$annio);
		return $respuesta;
	}//function ctrBuscarCtto
}//class ControladorArbolVen
?>