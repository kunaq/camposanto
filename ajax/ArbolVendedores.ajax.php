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
		if($respuesta["fch_activacion"] != ''){
				$respuesta["fch_activacion"] = date_format(new DateTime($respuesta["fch_activacion"]), 'd-m-Y');
				var_dump($respuesta["fch_activacion"]);
		    }
		// $respuesta["fch_activacion"] = ($respuesta["fch_activacion"] != '') ? dateFormat($respuesta["fch_activacion"]) : '';
		// $respuesta["fch_emision"]=($respuesta["fch_emision"] != '') ? dateFormat($respuesta["fch_emision"]) : '';
		// $respuesta["fch_resolucion"] = ($respuesta["fch_resolucion"] != '') ? dateFormat($respuesta["fch_resolucion"]) : '';
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