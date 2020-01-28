<?php
require_once "../funciones.php";
require_once "../controlador/refinanciamiento.controlador.php";
require_once "../modelo/refinanciamiento.modelo.php";
class AjaxRefinanciamiento{
	public function ajaxBuscaMotivo(){
		$respuesta = ControladorRefinanciamiento::ctrBuscaMotivo();
	echo json_encode($respuesta);
	}//ajaxBuscaMotivo
	public function ajaxBuscaNumServicio(){
		$respuesta = ControladorRefinanciamiento::ctrBuscaNumServicio();
	echo json_encode($respuesta);
	}//ajaxBuscaNumServicio
	public function ajaxBuscaDetCttoRes(){
		$respuesta = ControladorRefinanciamiento::ctrBuscaDetCttoRes();
		$respuesta["fch_resolucion"] = ($respuesta["fch_resolucion"] != '') ? dateFormat($respuesta["fch_resolucion"]) : '';
	echo json_encode($respuesta);
	}//ajaxBuscaDetCttoRes
	public function ajaxEjecutaProcedureResumenCtt(){
		$respuesta = ControladorRefinanciamiento::ctrEjecutaProcedureResumenCtt();
	echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxEjecutaProcedureResumenCtt
}//class AjaxRefinanciamiento
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'motivo'){
	$cliente = new AjaxRefinanciamiento();
	$cliente -> ajaxBuscaMotivo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'numServicio'){
	$cliente = new AjaxRefinanciamiento();
	$cliente -> ajaxBuscaNumServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'condicionResuelto'){
	$cliente = new AjaxRefinanciamiento();
	$cliente -> ajaxBuscaDetCttoRes();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaResumen' ){
	$cliente = new AjaxRefinanciamiento();
	$cliente -> ajaxEjecutaProcedureResumenCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'condicionRegular'){
	$cliente = new AjaxRefinanciamiento();
	$cliente -> ajaxBuscaDetCttoRes();
}