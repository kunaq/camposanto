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

	public function ajaxGetDireccionCliente(){
		$respuesta = ControladorCambioTitular::ctrGetDireccionCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDireccionCliente

	public function ajaxGetNombreCliente(){
		$respuesta = ControladorCambioTitular::ctrGetNombreCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetNombreCliente

	public function ajaxGetRefinServ(){
		$respuesta = ControladorCambioTitular::ctrGetRefinServ();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetRefinServ

	public function ajaxGetFlagsServicios(){
		$respuesta = ControladorCambioTitular::ctrGetFlagsServicios();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetFlagsServicios
	
	public function ajaxGetCambioTitular(){
		$respuesta = ControladorCambioTitular::ctrGetCambioTitular();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetCambioTitular
	
	public function ajaxGetEstadoCambioTitular(){
		$respuesta = ControladorCambioTitular::ctrGetEstadoCambioTitular();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetEstadoCambioTitular
	
	public function ajaxGetFoma(){
		$respuesta = ControladorCambioTitular::ctrGetFoma();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetFoma
	
	public function ajaxUpdateServicio(){
		$respuesta = ControladorCambioTitular::ctrUpdateServicio();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxUpdateFoma
	
	public function ajaxUpdateCambioTitular(){
		$respuesta = ControladorCambioTitular::ctrUpdateCambioTitular();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxUpdateCambioTitular

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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDireccionCliente'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetDireccionCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getNombreCliente'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetNombreCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getRefinServ'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetRefinServ();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'flags'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetFlagsServicios();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getCambioTitular'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetCambioTitular();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getEstadoCambioTitular'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetEstadoCambioTitular();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getFoma'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxGetFoma();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'updateServicio'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxUpdateServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'updateCambioTitular'){
	$cliente = new AjaxCambioTitular();
	$cliente -> ajaxUpdateCambioTitular();
}
