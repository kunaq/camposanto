<?php
require_once "../core.php";
require_once "../funciones.php";
require_once "../controlador/VPS.controlador.php";
require_once "../modelo/VPS.modelo.php";
class AjaxVPS{
	public function ajaxBuscaBenef(){
		$respuesta = ControladorVPS::ctrBuscaBenef();
		echo json_encode($respuesta);
	}//function ajaxBuscaBenef
	public function ajaxVerDetTrabajador(){
		$respuesta = ControladorVPS::ctrVerDetTrabajador();
		echo json_encode($respuesta);
	}//function ajaxVerDetTrabajador
	public function ajaxNombreTrabajador(){
		$respuesta = ControladorVPS::ctrNombreTrabajador();
		echo json_encode($respuesta);
	}//function ajaxNombreTrabajador
	public function ajaxBuscarCtto(){
		$respuesta = ControladorVPS::ctrBuscarCtto();
		echo json_encode($respuesta);
	}//function ajaxBuscarCtto
}//class AjaxVPS
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'buscaBenef'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscaBenef();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetTrabajador'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxVerDetTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'nombreTrabajador'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxNombreTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaCtto'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscarCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'listaFueVen'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscarFueVen();
}