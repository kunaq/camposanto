<?php
require_once "../funciones.php";
require_once "../controlador/resCtto.controlador.php";
require_once "../modelo/resCtto.modelo.php";
class AjaxResCtto{

	}//class AjaxResCtto
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'tabla'){
	$cliente = new AjaxResCtto();
	// $cliente -> ajaxBuscaCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'conCodigo'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaCtto();
}