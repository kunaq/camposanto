<?php
require_once "../funciones.php";
require_once "../controlador/cambioTitular.controlador.php";
require_once "../modelo/cambioTitular.modelo.php";

class AjaxCambioTitular{

	public function ajaxGetServiciosCtt(){
		$respuesta = ControladorCambioTitular::ctrGetServiciosCtt();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetServiciosCtt

	public function ajaxGetDatosCliente(){
		$respuesta = ControladorCambioTitular::ctrGetDatosCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDatosCliente

	public function ajaxGetNombreCliente(){
		$respuesta = ControladorCambioTitular::ctrGetNombreCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetNombreCliente

	public function ajaxGetRefinServ(){
		$respuesta = ControladorCambioTitular::ctrGetRefinServ();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetRefinServ

}//class AjaxCambioTitular


/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'getServiciosCtt'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetServiciosCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDatosCliente'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetDatosCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getNombreCliente'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetNombreCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getRefinServ'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetRefinServ();
}

