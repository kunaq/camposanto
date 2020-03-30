<?php
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

	static public function ctrCierraProc(){
		$tipoPeriodo = $_POST['tipo_periodo'];
		$periodo = $_POST['ls_periodo'];
		$anio = $_POST['anno'];
		$flgCierre = $_POST[''];
		$tabla = "vtaca_pago_comision";
		$respuesta = ModeloPeriodoVenta::mdlCierraProc($tabla,$tipoPeriodo,$anio,$periodo,$flgCierre);
		return $respuesta;
	}
}//class ControladorPeriodoVenta
?>