<?php
require_once "../funciones.php";
require_once "../controlador/resCtto.controlador.php";
require_once "../modelo/resCtto.modelo.php";
class AjaxResCtto{
	public function ajaxBuscaMotivo(){
		$respuesta = ControladorResCtto::ctrBuscaMotivo();
	echo json_encode($respuesta);
	}//ajaxBuscaMotivo
	public function ajaxBuscaNumServicio(){
		$respuesta = ControladorResCtto::ctrBuscaNumServicio();
	echo json_encode($respuesta);
	}//ajaxBuscaNumServicio
	public function ajaxBuscaDsctoXCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaDsctoXCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_registro"] = ($respuesta[$key]["fch_registro"] != '') ? dateTimeFormat($respuesta[$key]["fch_registro"]) : '';
		}	
	echo json_encode($respuesta);
	}//ajaxBuscaDsctoXCtto
}//class AjaxResCtto
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'motivo'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaMotivo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'numServicio'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaNumServicio();
}