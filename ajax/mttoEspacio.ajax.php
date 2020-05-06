<?php
require_once "../core.php";
require_once "../controlador/mttoEspacio.controlador.php";
require_once "../modelo/mttoEspacio.modelo.php";
class AjaxMttoEspacio{
	public function ajaxListaMtto(){
		$respuesta = ControladorMttoEspacio::ctrListaMtto();
		echo json_encode($respuesta);
	}//function ajaxListaMtto
	public function ajaxSelectTipoEsp(){
		$respuesta = ControladorMttoEspacio::ctrSelectTipoEsp();
		echo json_encode($respuesta);
	}//function ajaxSelectTipoEsp
	public function ajaxSelectEstado(){
		$respuesta = ControladorMttoEspacio::ctrSelectEstado();
		echo json_encode($respuesta);
	}//function ajaxSelectEstado
	public function ajaxBorrarAnterior(){
		$respuesta = ControladorMttoEspacio::ctrBorrarAnterior();
		echo json_encode($respuesta);
	}//function ajaxBorrarAnterior
	public function ajaxInsertaDet(){
		$respuesta = ControladorMttoEspacio::ctrInsertaDet();
		echo json_encode($respuesta);
	}//function ajaxInsertaDet
	public function ajaxFlgLibre(){
		$respuesta = ControladorMttoEspacio::ctrFlgLibre();
		echo json_encode($respuesta);
	}//function ajaxFlgLibre
	public function ajaxExeProcedure(){
		$respuesta = ControladorMttoEspacio::ctrExeProcedure();
		echo json_encode($respuesta);
	}//function ajaxExeProcedure
	public function ajaxActualizaCabecera(){
		$respuesta = ControladorMttoEspacio::ctrActualizaCabecera();
		echo json_encode($respuesta);
	}//function ajaxActualizaCabecera
}//class AjaxMttoEspacio
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'listaMtto'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxListaMtto();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'selectTipoEsp'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxSelectTipoEsp();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'selectEstado'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxSelectEstado();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'borrarAnterior'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxBorrarAnterior();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'insertaDet'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxInsertaDet();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'flgLibre'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxFlgLibre();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'exeProcedure'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxExeProcedure();
}else if(isset($_POST["entrada"]) && $_POST["entrada"] == 'actualizaCabecera'){
	$cliente = new AjaxMttoEspacio();
	$cliente -> ajaxActualizaCabecera();
}