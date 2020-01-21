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

}//class ControladorResCtto
?>