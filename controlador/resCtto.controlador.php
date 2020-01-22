<?php
@session_start();
class ControladorResCtto{

	static public function ctrBuscaMotivo(){
		$tablaTipo = 'vtavi_motivo_x_tipo_resolucion';
		$tablaMotivo = 'vtama_motivo_resolucion';
		$codTipo = $_POST['codTipo'];
		$respuesta = ModeloResCtto::mdlBuscaMotivo($tablaTipo,$tablaMotivo,$codTipo);
		return $respuesta;
	}//ctrBuscaMotivo

	static public function ctrBuscaNumServicio(){
		$tablaTipo = 'vtade_contrato';
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloResCtto::mdlBuscaNumServicio($tablaCtto,$codCtto);
		return $respuesta;
	}//ctrBuscaNumServicio

	static public function ctrBuscaDetCttoRes(){
		$tablaCtto = 'vtade_contrato';
		$tablaResolucion = 'vtavi_resolucion_contrato';
		$codCtto = $_POST['codCtto'];
		$numServicio = $_POST['numServicio'];
		$respuesta = ModeloResCtto::mdlBuscaDetCttoRes($tablaCtto,$tablaResolucion,$codCtto,$numServicio);
		return $respuesta;
	}//ctrBuscaNumServicio

}//class ControladorResCtto
?>