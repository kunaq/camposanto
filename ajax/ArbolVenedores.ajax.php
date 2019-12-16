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
	// public function ajaxVerDetPeriodo(){
	// 	$respuesta = ControladorArbolVen::ctrVerDetPeriodo();
	// 	echo json_encode($respuesta);
	// }//function ajaxVerDetPeriodo
}//class AjaxArbolVen
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'verTrabajadores'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxListaTrabajadores();
}
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetPeriodo'){
// 	$cliente = new AjaxArbolVen();
// 	$cliente -> ajaxVerDetPeriodo();
// }