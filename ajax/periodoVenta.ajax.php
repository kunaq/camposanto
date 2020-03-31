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
		$respuesta[$key]["fch_inicio"] = ($respuesta[$key]["fch_inicio"] !='') ? dateFormat($respuesta[$key]["fch_inicio"]) : '';
		$respuesta[$key]["fch_fin"] = ($respuesta[$key]["fch_fin"] != '') ? dateFormat($respuesta[$key]["fch_fin"]) : '';
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
	public function ajaxCierraProc(){
		$respuesta = ControladorPeriodoVenta::ctrCierraProc();
		echo json_encode($respuesta);
	}//function ajaxCierraProc
	public function ajaxCreaNvoAnio(){
		$respuesta = ControladorPeriodoVenta::ctrCreaNvoAnio();
		echo json_encode($respuesta);
	}//function ajaxCreaNvoAnio
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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'cierraProc'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxCierraProc();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'creaNvoAnio'){
	$cliente = new AjaxPeriodoVenta();
	$cliente -> ajaxCreaNvoAnio();
}