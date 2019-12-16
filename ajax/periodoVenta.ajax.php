<?php
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