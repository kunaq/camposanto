<?php
require_once "../core.php";
require_once "../funciones.php";
require_once "../controlador/usuario.controlador.php";
require_once "../modelo/usuario.modelo.php";
require_once "../controlador/localidad.controlador.php";
require_once "../modelo/localidad.modelo.php";
require_once "../controlador/empresa.controlador.php";
require_once "../modelo/empresa.modelo.php";
class AjaxUsuario{
	/*=============================================
	INGRESO USUARIO
	=============================================*/
	public function ajaxIngresoUsuario(){
		$respuesta = ControladorUsuario::ctrIngresoUsuario();
		echo json_encode($respuesta);
	}//function ajaxIngresoUsuario

	/*=============================================
	AUTORIZAR CAMBIOS POR USUARIO
	=============================================*/
	public function ajaxPermisoUsuario(){
		$item1 = "cod_usuario";
		$valor1 = $_POST["user"];
		$item2 = "dsc_clave";
		$valor2 = $_POST["clave"];
		$entrada = $_POST["entrada"];
		$respuesta = ControladorUsuario::ctrPermisoUsuario($item1,$valor1,$item2,$valor2,$entrada);
		echo json_encode($respuesta);
	}//function ajaxPermisoUsuario
}//class AjaxUsuario
/*=============================================
ACCIONES USUARIO
=============================================*/
if(isset($_POST["accionUsuario"]) && $_POST["accionUsuario"] == 'mostrar'){
	$usuario = new AjaxUsuario();
	$usuario -> ajaxMostrarUsuario();
}else if(isset($_POST["accionUsuario"]) && $_POST["accionUsuario"] == 'ingreso'){
	$usuario = new AjaxUsuario();
	$usuario -> ajaxIngresoUsuario();
}else if(isset($_POST["accionUsuario"]) && $_POST["accionUsuario"] == 'permiso'){
	$usuario = new AjaxUsuario();
	$usuario -> ajaxPermisoUsuario();
}
