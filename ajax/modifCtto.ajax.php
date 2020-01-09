<?php
require_once "../funciones.php";
require_once "../controlador/modifCtto.controlador.php";
require_once "../modelo/modifCtto.modelo.php";
class AjaxModifCtto{
	public function ajaxBuscaCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaCtto();
		$respuesta['fch_generacion'] = ($respuesta['fch_generacion'] != '') ? date_format(new DateTime($respuesta['fch_generacion']), 'd/m/Y') : '';
		$respuesta['fch_emision'] = ($respuesta['fch_emision'] != '') ? date_format(new DateTime($respuesta['fch_emision']), 'd/m/Y') : '';
		$respuesta['fch_anulacion'] = ($respuesta['fch_anulacion'] != '') ? date_format(new DateTime($respuesta['fch_anulacion']), 'd/m/Y') : '';
		$respuesta['fch_activacion'] = ($respuesta['fch_activacion'] != '') ? date_format(new DateTime($respuesta['fch_activacion']), 'd/m/Y') : '';
		$respuesta['fch_resolucion'] = ($respuesta['fch_resolucion'] != '') ? date_format(new DateTime($respuesta['fch_resolucion']), 'd/m/Y') : '';
		$respuesta['fch_primer_vencimiento'] = ($respuesta['fch_primer_vencimiento'] != '') ? date_format(new DateTime($respuesta['fch_primer_vencimiento']), 'd/m/Y') : '';
		$respuesta['fch_transferencia'] = ($respuesta['fch_transferencia'] != '') ? date_format(new DateTime($respuesta['fch_transferencia']), 'd/m/Y') : '';
		$respuesta['fch_real_generacion'] = ($respuesta['fch_real_generacion'] != '') ? date_format(new DateTime($respuesta['fch_real_generacion']), 'd/m/Y') : '';
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