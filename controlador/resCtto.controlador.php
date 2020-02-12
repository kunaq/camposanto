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

	static public function ctrGetHisTrabajador(){
		$cod_consejero = $_POST['cod_consejero'];
		$num_anno = $_POST['num_anno'];
		$cod_tipo_periodo = $_POST['cod_tipo_periodo'];
		$cod_periodo = $_POST['cod_periodo'];
		$respuesta = ModeloResCtto::mdlGetHisTrabajador($cod_consejero,$num_anno,$cod_tipo_periodo,$cod_periodo);
		return $respuesta;
	}//ctrGetHisTrabajador

	static public function ctrGetDatosCliente(){
		$cod_cliente = $_POST['codCliente'];
		$respuesta = ModeloResCtto::mdlGetDatosCliente($cod_cliente);
		return $respuesta;
	}//ctrGetDatosCliente
	
	static public function ctrGetConformacion(){
		$cod_localidad = $_POST['cod_localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$num_refinanciamiento = $_POST['num_refinanciamiento'];
		$respuesta = ModeloResCtto::mdlGetConformacion($cod_localidad,$cod_contrato,$num_refinanciamiento);
		return $respuesta;
	}//ctrGetConformacion
	
	static public function ctrVerificaContado(){
		$datos = array("cod_localidad" => $_POST['cod_localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloResCtto::mdlVerificaContado($datos);
		return $respuesta;
	}//ctrVerificaContado
	
	static public function ctrActualizaVtadeCtt(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("fch_actual" => $fechaActual,
						"usuario" => $_SESSION["user"],
						"cod_localidad" => $_POST['cod_localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloResCtto::mdlActualizaVtadeCtt($datos);
		return $respuesta;
	}//ctrActualizaVtadeCtt
	
	static public function ctrInsertaResolucion(){
		$datos = array("usuario" => $_SESSION["user"],
						"cod_localidad" => $_POST['cod_localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio'],
						"fch_registro" => $_POST['fch_registro'],
						"cod_tipo_movimiento" => $_POST['cod_tipo_movimiento'],
						"num_anno" => $_POST['num_anno'],
						"cod_tipo_periodo" => $_POST['cod_tipo_periodo'],
						"cod_periodo" => $_POST['cod_periodo'],
						"cod_jefe_ventas" => $_POST['cod_jefe_ventas'],
						"cod_supervisor" => $_POST['cod_supervisor'],
						"cod_vendedor" => $_POST['cod_vendedor'],
						"cod_grupo" => $_POST['cod_grupo'],
						"imp_porc_afecto" => (float)$_POST['imp_porc_afecto'],
						"imp_afecto" => (float)$_POST['imp_afecto'],
						"cod_tipo_resolucion" => $_POST['cod_tipo_resolucion'],
						"cod_motivo_resolucion" => $_POST['cod_motivo_resolucion'],
						"dsc_motivo_usuario" => $_POST['dsc_motivo_usuario'],
						"imp_tc" => (float)$_POST['imp_tc'],
						"flg_afecta_comision" => $_POST['flg_afecta_comision'],
						"imp_pagado" => (float)$_POST['imp_pagado']
					);
		$respuesta = ModeloResCtto::mdlInsertaResolucion($datos);
		return $respuesta;
	}//ctrInsertaResolucion
	
	static public function ctrVerificaFoma(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("fch_actual" => $fechaActual,
						"usuario" => $_SESSION["user"],
						"cod_localidad" => $_POST['cod_localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloResCtto::mdlVerificaFoma($datos);
		return $respuesta;
	}//ctrVerificaFoma

	static public function ctrGuardaObservacion(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("fch_actual" => $fechaActual,
						"usuario" => $_SESSION["user"],
						"cod_localidad" => $_POST['cod_localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloResCtto::mdlVerificaFoma($datos);
		return $respuesta;
	}//ctrGuardaObservacion

}//class ControladorResCtto
?>