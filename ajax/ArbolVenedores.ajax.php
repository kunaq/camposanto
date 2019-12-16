<?php
require_once "../funciones.php";
require_once "../controlador/arbolVen.controlador.php";
require_once "../modelo/arbolVen.modelo.php";
class AjaxArbolVen{
	public function ajaxListaTrabajadores(){
		$respuesta = ControladorArbolVen::ctrMostrarTraArbolVen();
		$respuesta = utf8_converter($respuesta);
		echo json_encode($respuesta);
	}//function ajaxListaTrabajadores
	public function ajaxVerDetTrabajador(){
		$respuesta = ControladorArbolVen::ctrVerDetTrabajador();
		echo json_encode($respuesta);
	}//function ajaxVerDetTrabajador
}//class AjaxArbolVen
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'verTrabajadores'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxListaTrabajadores();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetTrabajador'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxVerDetTrabajador();
}