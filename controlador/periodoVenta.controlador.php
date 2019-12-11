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

}//class ControladorPeriodoVenta
?>