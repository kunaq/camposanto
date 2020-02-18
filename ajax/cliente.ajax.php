<?php
require_once "../funciones.php";
require_once "../controlador/cliente.controlador.php";
require_once "../modelo/cliente.modelo.php";

class AjaxCliente{
	public function ajaxInsertaCliente(){
		$respuesta = ControladorCliente::ctrInsertaCliente();
	echo json_encode($respuesta);
	}//ajaxInsertaCliente

	public function ajaxInsertaDireccionCliente(){
		$respuesta = ControladorCliente::ctrInsertaDireccionCliente();
	echo json_encode($respuesta);
	}//ajaxInsertaDireccionCliente
}//class AjaxCliente

/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaCliente'){
	$cliente = new AjaxCliente();
	$cliente -> ajaxInsertaCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaDireccion'){
	$cliente = new AjaxCliente();
	$cliente -> ajaxInsertaDireccionCliente();
}
