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
	public function ajaxBuscaDetCttoRes(){
		$respuesta = ControladorResCtto::ctrBuscaDetCttoRes();
		$respuesta["fch_resolucion"] = ($respuesta["fch_resolucion"] != '') ? dateFormat($respuesta["fch_resolucion"]) : '';
	echo json_encode($respuesta);
	}//ajaxBuscaDetCttoRes
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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'condicionResuelto'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaDetCttoRes();
}