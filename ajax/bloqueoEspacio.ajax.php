<?php
require_once "../core.php";
require_once "../controlador/bloqueoEspacio.controlador.php";
require_once "../modelo/bloqueoEspacio.modelo.php";
class AjaxBloqueoEspacio{
	public function ajaxListaBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrListaBloqueo();
		$respuesta = utf8_converter($respuesta);
		echo json_encode($respuesta);
	}//function ajaxListaBloqueo
	public function ajaxDscBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrDscBloqueo();
		echo $respuesta;
	}//function ajaxDscBloqueo
	public function ajaxFlgNicho(){
		$respuesta = ControladorBloqueoEspacio::ctrFlgNicho();
		echo $respuesta;
	}//function ajaxFlgNicho
	public function ajaxFlgBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrFlgBloqueo();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxFlgBloqueo
	public function ajaxFlgLibre(){
		$respuesta = ControladorBloqueoEspacio::ctrFlgLibre();
		echo json_encode($respuesta);
	}//function ajaxFlgLibre
	public function ajaxCdtBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrCdtBloqueo();
		echo $respuesta;
	}//function ajaxCdtBloqueo
	public function ajaxCdtEspacio(){
		$respuesta = ControladorBloqueoEspacio::ctrCdtEspacio();
		echo $respuesta;
	}//function ajaxCdtEspacio
	public function ajaxExisteBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrExisteBloqueo();
		echo $respuesta;
	}//function ajaxExisteBloqueo
	public function ajaxExisteEventoBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrExisteEventoBloqueo();
		echo json_encode($respuesta);
	}//function ajaxExisteEventoBloqueo
	public function ajaxFlgBloqueoResolucion(){
		$respuesta = ControladorBloqueoEspacio::ctrFlgBloqueoResolucion();
		echo json_encode($respuesta);
	}//function ajaxFlgBloqueoResolucion
	public function ajaxFlgBloqueado(){
		$respuesta = ControladorBloqueoEspacio::ctrFlgBloqueado();
		echo json_encode($respuesta);
	}//function ajaxFlgBloqueado
	public function ajaxEjecutaBloqueo(){
		$respuesta = ControladorBloqueoEspacio::ctrEjecutaBloqueo();
		echo $respuesta;
	}//function ajaxEjecutaBloqueo
}//class AjaxBloqueoEspacio
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'listaBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxListaBloqueo();
}else if(isset($_GET["entrada"]) && $_GET["entrada"] == 'dscBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxDscBloqueo();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flgNicho'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxFlgNicho();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flgBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxFlgBloqueo();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flgLibre'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxFlgLibre();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'cdtBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxCdtBloqueo();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'cdtEspacio'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxCdtEspacio();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'existeBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxExisteBloqueo();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'existeEventoBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxExisteEventoBloqueo();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flgBloqueoResolucion'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxFlgBloqueoResolucion();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flg_bloqueado'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxFlgBloqueado();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'ejecutaBloqueo'){
	$cliente = new AjaxBloqueoEspacio();
	$cliente -> ajaxEjecutaBloqueo();
}