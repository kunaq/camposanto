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
	public function ajaxStoreTabla(){
		$respuesta = ControladorVPS::ctrStoreTabla();
		echo json_encode($respuesta);
	}//function ajaxStoreTabla
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
else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'storeTabla'){
	$cliente = new AjaxVPS();
	$cliente -> ajaxStoreTabla();
}