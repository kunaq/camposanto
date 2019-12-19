<?php
require_once "../funciones.php";
require_once "../controlador/arbolVen.controlador.php";
require_once "../modelo/arbolVen.modelo.php";
class AjaxArbolVen{
	public function ajaxListaTrabajadores(){
		$respuesta = ControladorArbolVen::ctrMostrarTraArbolVen();
		$respuesta = utf8_converter($respuesta);
		echo json_encode($respuesta);
	}//function ajaxListaTrabajadores
	public function ajaxVerDetTrabajador(){
		$respuesta = ControladorArbolVen::ctrVerDetTrabajador();
		echo json_encode($respuesta);
	}//function ajaxVerDetTrabajador
	public function ajaxNombreTrabajador(){
		$respuesta = ControladorArbolVen::ctrNombreTrabajador();
		echo json_encode($respuesta);
	}//function ajaxNombreTrabajador
	public function ajaxBuscarCtto(){
		$respuesta = ControladorArbolVen::ctrBuscarCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_activacion"] = ($respuesta[$key]["fch_activacion"] != null) ? dateFormat($respuesta[$key]["fch_activacion"]) : $respuesta[$key]["fch_activacion"];
			$respuesta[$key]["fch_emision"] = ($respuesta[$key]["fch_emision"] != null) ? dateFormat($respuesta[$key]["fch_emision"]) : $respuesta[$key]["fch_emision"];
			$respuesta[$key]["fch_resolucion"] = ($respuesta[$key]["fch_resolucion"] != null) ? dateFormat($respuesta[$key]["fch_resolucion"]) : $respuesta[$key]["fch_resolucion"];
		}
		echo json_encode($respuesta);
	}//function ajaxBuscarCtto
}//class AjaxArbolVen
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'verTrabajadores'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxListaTrabajadores();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verDetTrabajador'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxVerDetTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'nombreTrabajador'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxNombreTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaCtto'){
	$cliente = new AjaxArbolVen();
	$cliente -> ajaxBuscarCtto();
}