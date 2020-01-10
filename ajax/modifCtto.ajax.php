<?php
require_once "../funciones.php";
require_once "../controlador/modifCtto.controlador.php";
require_once "../modelo/modifCtto.modelo.php";
class AjaxModifCtto{
	public function ajaxBuscaCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_generacion"] = dateFormat($respuesta[$key]["fch_generacion"]);
			$respuesta[$key]["fch_anulacion"] = ($respuesta[$key]["fch_anulacion"] != '') ? dateFormat($respuesta[$key]["fch_anulacion"]) : '';
			$respuesta[$key]["fch_emision"] = ($respuesta[$key]["fch_emision"] != '') ? dateFormat($respuesta[$key]["fch_emision"]) : '';
			$respuesta[$key]["fch_activacion"] = ($respuesta[$key]["fch_activacion"] != '') ? dateFormat($respuesta[$key]["fch_activacion"]) : '';
			$respuesta[$key]["fch_resolucion"] = ($respuesta[$key]["fch_resolucion"] != '') ? dateFormat($respuesta[$key]["fch_resolucion"]) : '';
			$respuesta[$key]["fch_primer_vencimiento"] = ($respuesta[$key]["fch_primer_vencimiento"] != '') ? dateFormat($respuesta[$key]["fch_primer_vencimiento"]) : '';
			$respuesta[$key]["fch_termino_carencia"] = ($respuesta[$key]["fch_termino_carencia"] != '') ? dateFormat($respuesta[$key]["fch_termino_carencia"]) : '';
			$respuesta[$key]["fch_transferencia"] = ($respuesta[$key]["fch_transferencia"] != '') ? dateFormat($respuesta[$key]["fch_transferencia"]) : '';
			$respuesta[$key]["fch_real_generacion"] = ($respuesta[$key]["fch_real_generacion"] != '') ? dateFormat($respuesta[$key]["fch_real_generacion"]) : '';
		}
		echo json_encode($respuesta);
	}//function ajaxBuscaCtto
	public function ajaxBuscaDatosServicio(){
		$respuesta = ControladorModifCtto::ctrBuscaDatosServicio();
		$respuesta["fch_generacion"] = ($respuesta["fch_generacion"] != '') ? dateFormat($respuesta["fch_generacion"]) : '';
		$respuesta["fch_anulacion"] = ($respuesta["fch_anulacion"] != '') ? dateFormat($respuesta["fch_anulacion"]) : '';
		$respuesta["fch_emision"]= ($respuesta["fch_emision"] != '') ? dateFormat($respuesta["fch_emision"]) : '';
		$respuesta["fch_activacion"] = ($respuesta["fch_activacion"] != '') ? dateFormat($respuesta["fch_activacion"]) : '';
		$respuesta["fch_resolucion"] = ($respuesta["fch_resolucion"] != '') ? dateFormat($respuesta["fch_resolucion"]) : '';
		$respuesta["fch_primer_vencimiento"] = ($respuesta["fch_primer_vencimiento"] != '') ? dateFormat($respuesta["fch_primer_vencimiento"]) : '';
		echo json_encode($respuesta);
	}//ajaxBuscaDatosServicio
}//class AjaxModifCtto
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'tabla'){
	$cliente = new AjaxModifCtto();
	// $cliente -> ajaxBuscaCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'conCodigo'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'pestannas'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaDatosServicio();
}