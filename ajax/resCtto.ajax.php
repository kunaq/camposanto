<?php
require_once "../core.php";
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
	
	public function ajaxVerificaContado(){
		$respuesta = ControladorResCtto::ctrVerificaContado();
		echo json_encode($respuesta);
	}//ajaxVerificaContado
	
	public function ajaxActualizaVtadeCtt(){
		$respuesta = ControladorResCtto::ctrActualizaVtadeCtt();
		echo json_encode($respuesta);
	}//ajaxActualizaVtadeCtt
	
	public function ajaxInsertaResolucion(){
		$respuesta = ControladorResCtto::ctrInsertaResolucion();
		echo json_encode($respuesta);
	}//ajaxInsertaResolucion
	
	public function ajaxVerificaFoma(){
		$respuesta = ControladorResCtto::ctrVerificaFoma();
		echo json_encode($respuesta);
	}//ajaxVerificaFoma
	
	public function ajaxGuardaObservacion(){
		$respuesta = ControladorResCtto::ctrGuardaObservacion();
		echo json_encode($respuesta);
	}//ajaxGuardaObservacion
	
	public function ajaxActualizaConograma(){
		$respuesta = ControladorResCtto::ctrActualizaConograma();
		echo json_encode($respuesta);
	}//ajaxActualizaConograma
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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getConformacion'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxGetConformacion();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verificaContado'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxVerificaContado();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actualizavtadeCtt'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxActualizaVtadeCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'insertarResolucion'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxInsertaResolucion();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verificaFoma'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxVerificaFoma();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaObsevacion'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxGuardaObservacion();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actualizaCronograma'){
	$cliente = new AjaxResCtto();
	$cliente -> ajaxActualizaConograma();
}