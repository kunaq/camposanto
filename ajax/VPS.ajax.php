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
	public function ajaxBuscaDetBenef(){
		$respuesta = ControladorVPS::ctrBuscaDetBenef();
		echo json_encode($respuesta);
	}//function ajaxBuscaDetBenef
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
else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'buscaDetBenef'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscaDetBenef();
}
else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'nombreTrabajador'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxNombreTrabajador();
}
else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'buscaCtto'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscarCtto();
}
else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'listaFueVen'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxBuscarFueVen();
}