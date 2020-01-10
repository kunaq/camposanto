<?php
@session_start();
class ControladorModifCtto{

	static public function ctrBuscaCtto(){
		$tabla = "vtade_contrato";
		$tabla2 = 'vtama_cliente';
		$tabla3 = 'vtaca_contrato';
		$tabla4 = 'vtama_camposanto';
		$tabla5 = 'vtama_area_plataforma';
		$tabla6 = 'vtama_plataforma';
		$tabla7 = 'vtama_tipo_espacio';
		$tabla8 = 'vtama_tipo_servicio';
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloModifCtto::mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$codCtto);
		return $respuesta;
	}//function ctrBuscaCtto

	static public function ctrBuscaDatosServicio(){
		$tabla = 'vtade_contrato';
		4tabla2 = 'vtade_contrato';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaDatosServicio($tabla,$tabla2,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaDatosServicio

}//class ControladorModifCtto
?>