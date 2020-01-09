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
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloModifCtto::mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$codCtto);
		return $respuesta;
	}//function ctrBuscaCtto

}//class ControladorModifCtto
?>