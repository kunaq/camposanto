<?php
@session_start();
class ControladorModifCtto{
	static public function ctrBuscaCtto(){
		$tabla = "vtade_contrato";
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloModifCtto::mdlBuscaCttos($tabla,$codCtto);
		return $respuesta;
	}//function ctrEdoEspacio

}//class ControladorModifCtto
?>