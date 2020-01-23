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
		$tablaCtto = 'vtade_contrato';
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloResCtto::mdlBuscaNumServicio($tablaCtto,$codCtto);
		return $respuesta;
	}//ctrBuscaNumServicio

	static public function ctrBuscaDetCttoRes(){
		$tablaCtto = 'vtade_contrato';
		$tablaResolucion = 'vtavi_resolucion_contrato';
		$tablaMaTipSer = 'vtama_tipo_servicio';
		$codCtto = $_POST['codCtto'];
		$numServicio = $_POST['numServicio'];
		$respuesta = ModeloResCtto::mdlBuscaDetCttoRes($tablaCtto,$tablaResolucion,$tablaMaTipSer,$codCtto,$numServicio);
		return $respuesta;
	}//ctrBuscaNumServicio

	static public function ctrEjecutaProcedureResumenCtt(){

		$datos = array("as_localidad" => $_POST['as_localidad'],
						"as_tipo_ctt" => $_POST['as_tipo_ctt'],
						"as_contrato" => $_POST['as_contrato'],
						"as_servicio" => $_POST['as_servicio'],
						"ai_ref" => $_POST['ai_ref'],
						"as_total" => "NO",
						"as_tipo_programa" => $_POST['as_tipo_programa'],
					);
		$respuesta = ModeloResCtto::mdlEjecutaProcedureResumenCtt($datos);
		return $respuesta;
	}//function ctrEjecutaProcedureResumenCtt

}//class ControladorResCtto
?>