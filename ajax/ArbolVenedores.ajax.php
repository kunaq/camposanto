<?php
require_once "../funciones.php";
require_once "../controlador/ArbolVen.controlador.php";
require_once "../modelo/ArbolVen.modelo.php";
class AjaxArbolVen{
	public function ajaxListaTrabajadores(){
		$respuesta = ControladorArbolVen::ctrMostrarTraArbolVen();
		echo json_encode($respuesta);
	}//function ajaxListaTrabajadores
	public function ajaxVerDetPeriodo(){
		$respuesta = ControladorArbolVen::ctrVerDetPeriodo();
		echo json_encode($respuesta);
	}//function ajaxVerDetPeriodo
}//class AjaxArbolVen
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'verTrabajadores'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxListaTrabajadores();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetPeriodo'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxVerDetPeriodo();
}