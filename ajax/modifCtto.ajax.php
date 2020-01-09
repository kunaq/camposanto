<?php
require_once "../funciones.php";
require_once "../controlador/modifCtto.controlador.php";
require_once "../modelo/modifCtto.modelo.php";
class AjaxModifCtto{
	public function ajaxBuscaCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaCtto();
		$respuesta['fch_generacion'] = ($respuesta['fch_generacion'] != '') ? dateFormat($respuesta['fch_generacion']) : '';
		$respuesta['fch_emision'] = ($respuesta['fch_emision'] != '') ? dateFormat($respuesta['fch_emision']) : '';
		$respuesta['fch_anulacion'] = ($respuesta['fch_anulacion'] != '') ? dateFormat($respuesta['fch_anulacion']) : '';
		$respuesta['fch_activacion'] = ($respuesta['fch_activacion'] != '') ? dateFormat($respuesta['fch_activacion']) : '';
		$respuesta['fch_resolucion'] = ($respuesta['fch_resolucion'] != '') ? dateFormat($respuesta['fch_resolucion']) : '';
		$respuesta['fch_primer_vencimiento'] = ($respuesta['fch_primer_vencimiento'] != '') ? dateFormat($respuesta['fch_primer_vencimiento']) : '';
		$respuesta['fch_transferencia'] = ($respuesta['fch_transferencia'] != '') ? dateFormat($respuesta['fch_transferencia']) : '';
		$respuesta['fch_real_generacion'] = ($respuesta['fch_real_generacion'] != '') ? dateFormat($respuesta['fch_real_generacion']) : '';
		echo json_encode($respuesta);
	}//function ajaxBuscaCtto
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