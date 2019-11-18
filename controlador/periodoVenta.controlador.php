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

}//class ControladorPeriodoVenta
?>