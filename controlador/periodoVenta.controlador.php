<?php
@session_start();
class ControladorPeriodoVenta{
	static public function ctrListaPeriodo(){
		$tabla = "vtama_periodo";
		if($_POST['tipoPeriodo'] == 'todos'){
			$tipoPeriodo = '';
		}else{
			$tipoPeriodo = $_POST['tipoPeriodo'];
		}

		if( $_POST['anio'] == 'todos'){
 			$anio = '';
		}else{
	    	$anio = $_POST['anio'];
		}
		$respuesta = ModeloPeriodoVenta::mdlListaPeriodo($tabla,$tipoPeriodo,$anio);
		return $respuesta;
	}//function ctrMostrarAnio

	static public function ctrVerDetPeriodo(){
		$tipoPeriodo = $_POST['tipoPeriodo'];
		$anio = $_POST['anio'];
		$tabla = "vtama_periodo";
		$respuesta = ModeloPeriodoVenta::mdlVerDetPeriodo($tabla,$tipoPeriodo,$anio);
		return $respuesta;
	}

	static public function ctrExstConf(){
		$tipoPeriodo = $_POST['tipo_periodo'];
		$anio = $_POST['anno'];
		$tabla = "vtama_periodo";
		$respuesta = ModeloPeriodoVenta::mdlExstConf($tabla,$tipoPeriodo,$anio);
		return $respuesta;
	}

	static public function ctrCopiaAnnio(){
		$tipoPeriodo = $_POST['tipo_periodo'];
		$anio = $_POST['anno'];
		$tabla = "vtama_periodo";
		$respuesta = ModeloPeriodoVenta::mdlCopiaAnnio($tabla,$tipoPeriodo,$anio);
		return $respuesta;
	}

	static public function ctrCreaNvoAnio(){
		$anio = $_POST['anno'];
		$tabla = "vtama_annos";
		$respuesta = ModeloPeriodoVenta::mdlCreaNvoAnio($tabla,$anio);
		return $respuesta;
	}

	static public function ctrCierraProc(){
		$tipoPeriodo = $_POST['tipo_periodo'];
		$periodo = $_POST['ls_periodo'];
		$anio = $_POST['anno'];
		$flgCierre = $_POST['flgCierre'];
		$li_anno_ant = $_POST['li_anno_ant'];
		$li_tipo_periodo_ant = $_POST['li_tipo_periodo_ant'];
		$li_periodo_ant = $_POST['li_periodo_ant'];
		$dsc_periodo = $_POST['dsc_periodo'];
		$num_mes = $_POST['num_mes'];
		$tabla = "vtaca_pago_comision";
		$ldt_inicio = $_POST['ldt_inicio'];
		$ldt_fin = $_POST['ldt_fin'];
		$usuario = $_SESSION['user'];
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$respuesta = ModeloPeriodoVenta::mdlCierraProc($tabla,$tipoPeriodo,$anio,$periodo,$flgCierre,$li_anno_ant,$li_tipo_periodo_ant,$li_periodo_ant,$dsc_periodo,$ldt_inicio,$ldt_fin,$num_mes,$usuario,$fechaActual);
		return $respuesta;
	}
}//class ControladorPeriodoVenta
?>