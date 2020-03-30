<?php
require_once "../core.php";
require_once "../funciones.php";
require_once "../controlador/periodoVenta.controlador.php";
require_once "../modelo/periodoVenta.modelo.php";
class AjaxPeriodoVenta{
	public function ajaxListaPeriodo(){
		$respuesta = ControladorPeriodoVenta::ctrListaPeriodo();
		echo json_encode($respuesta);
	}//function ajaxListaPeriodo
	public function ajaxVerDetPeriodo(){
		$respuesta = ControladorPeriodoVenta::ctrVerDetPeriodo();
		echo json_encode($respuesta);
	}//function ajaxVerDetPeriodo
	public function ajaxExstConf(){
		$respuesta = ControladorPeriodoVenta::ctrExstConf();
		echo json_encode($respuesta);
	}//function ajaxExstConf
	public function ajaxCopiaAnnio(){
		$respuesta = ControladorPeriodoVenta::ctrCopiaAnnio();
		echo json_encode($respuesta);
	}//function ajaxCopiaAnnio
}//class AjaxPeriodoVenta
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'listaPeriodo'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxListaPeriodo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetPeriodo'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxVerDetPeriodo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'exstConf'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxExstConf();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'copiaAnnio'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxCopiaAnnio();
}