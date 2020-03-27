<?php
require_once "../core.php";
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
	public function ajaxNombreTrabajador(){
		$respuesta = ControladorArbolVen::ctrNombreTrabajador();
		echo json_encode($respuesta);
	}//function ajaxNombreTrabajador
	public function ajaxBuscarCtto(){
		$respuesta = ControladorArbolVen::ctrBuscarCtto();
		echo json_encode($respuesta);
	}//function ajaxBuscarCtto
	public function ajaxBuscarFueVen(){
		$respuesta = ControladorArbolVen::ctrBuscarFueVen();
		echo json_encode($respuesta);
	}//function ajaxBuscarFueVen
	public function ajaxBuscarNomComi(){
		$respuesta = ControladorArbolVen::ctrBuscarNomComi();
		echo json_encode($respuesta);
	}//function ajaxBuscarNomComi
	public function ajaxExisteConsejero(){
		$respuesta = ControladorArbolVen::ctrExisteConsejero();
		echo json_encode($respuesta);
	}//function ajaxExisteConsejero
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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'nombreTrabajador'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxNombreTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaCtto'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxBuscarCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'listaFueVen'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxBuscarFueVen();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'comisionista'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxBuscarNomComi();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'existeConsejero'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxExisteConsejero();
}