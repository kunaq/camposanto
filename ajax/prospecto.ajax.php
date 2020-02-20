<?php
require_once "../funciones.php";
require_once "../controlador/prospecto.controlador.php";
require_once "../modelo/prospecto.modelo.php";

class AjaxProspecto{
	public function ajaxGuardaProspecto(){
		$respuesta = ControladorProspecto::ctrGuardaProspecto();
	echo json_encode($respuesta);
	}//ajaxGuardaProspecto

	public function ajaxGuardaContactoProspecto(){
		$respuesta = ControladorProspecto::ctrGuardaContactoProspecto();
	echo json_encode($respuesta);
	}//ajaxGuardaContactoProspecto
}//class AjaxProspecto

/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaProspecto'){
	$cliente = new AjaxProspecto();
	$cliente -> ajaxGuardaProspecto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaContacto'){
	$cliente = new AjaxProspecto();
	$cliente -> ajaxGuardaContactoProspecto();
}
