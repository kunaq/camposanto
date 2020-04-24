<?php
require_once "../core.php";
require_once "../controlador/mttoEspacio.controlador.php";
require_once "../modelo/mttoEspacio.modelo.php";
class AjaxMttoEspacio{
	public function ajaxListaMtto(){
		$respuesta = ControladorMttoEspacio::ctrListaMtto();
		echo json_encode($respuesta);
	}//function ajaxListaMtto
}//class AjaxMttoEspacio
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'listaMtto'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxListaMtto();
}else if(isset($_GET["entrada"]) && $_GET["entrada"] == 'dscMtto'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxDscMtto();
}