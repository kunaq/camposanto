<?php
require_once "../funciones.php";
require_once "../controlador/resCtto.controlador.php";
require_once "../modelo/resCtto.modelo.php";
class AjaxResCtto{
	public function ajaxBuscaMotivo(){
		$respuesta = ControladorResCtto::ctrBuscaMotivo();
	echo json_encode($respuesta);
	}//ajaxBuscaMotivo
	public function ajaxBuscaNumServicio(){
		$respuesta = ControladorResCtto::ctrBuscaNumServicio();
	echo json_encode($respuesta);
	}//ajaxBuscaNumServicio
	public function ajaxBuscaDetCttoRes(){
		$respuesta = ControladorResCtto::ctrBuscaDetCttoRes();
		$respuesta["fch_resolucion"] = ($respuesta["fch_resolucion"] != '') ? dateFormat($respuesta["fch_resolucion"]) : '';
	echo json_encode($respuesta);
	}//ajaxBuscaDetCttoRes
	public function ajaxEjecutaProcedureResumenCtt(){
		$respuesta = ControladorResCtto::ctrEjecutaProcedureResumenCtt();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxEjecutaProcedureResumenCtt
	public function ajaxGetHisTrabajador(){
		$respuesta = ControladorResCtto::ctrGetHisTrabajador();
		echo json_encode($respuesta);
	}//ajaxGetHisTrabajador
	
	public function ajaxGetDatosCliente(){
		$respuesta = ControladorResCtto::ctrGetDatosCliente();
		echo json_encode($respuesta);
	}//ajaxGetDatosCliente

	public function ajaxGetConformacion(){
		$respuesta = ControladorResCtto::ctrGetConformacion();
		echo json_encode($respuesta);
	}//ajaxGetConformacion
}//class AjaxResCtto
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'motivo'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaMotivo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'numServicio'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaNumServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'condicionResuelto'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaDetCttoRes();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaResumen' ){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxEjecutaProcedureResumenCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'condicionRegular'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxBuscaDetCttoRes();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getHisTrabajador'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxGetHisTrabajador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaCli'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxGetDatosCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getConformacion'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxGetConformacion();
}