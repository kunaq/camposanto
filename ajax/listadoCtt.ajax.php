<?php
require_once "../funciones.php";
require_once "../controlador/listadoCtt.controlador.php";
require_once "../modelo/listadoCtt.modelo.php";

class AjaxListadoCtt{
	public function ajaxValidaContrato(){
		$respuesta = ControladorListadoCtt::ctrValidaContrato();
	echo json_encode($respuesta);
	}//ajaxActivarContrato

	public function ajaxActivaContrato(){
		$respuesta = ControladorListadoCtt::ctrActivaContrato();
	echo json_encode($respuesta);
	}//ajaxGuardaContactoProspecto
}//class AjaxProspecto

/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'validaContrato'){
	$cliente = new AjaxListadoCtt();
	$cliente -> ajaxValidaContrato();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'activaContrato'){
	$cliente = new AjaxListadoCtt();
	$cliente -> ajaxActivaContrato();
}
