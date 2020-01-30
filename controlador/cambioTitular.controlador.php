<?php

session_start();

class ControladorCambioTitular{

	static public function ctrGetServiciosCtt(){
		$cod_localidad = $_POST['cod_localidad'];
		$cod_contrato = $_POST['cod_contrato'];
	    
		$respuesta = ModeloCambioTitular::mdlgetServiciosCtt($cod_localidad,$cod_contrato);
		return $respuesta;
	}//function ctrGetServiciosCtt
	
	static public function ctrGetDatosCliente(){

		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloCambioTitular::mdlGetDatosCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetDatosCliente
	
	static public function ctrGetNombreCliente(){

		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloCambioTitular::mdlGetNombreCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetNombreCliente

	static public function ctrGetRefinServ(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$cod_servicio = $_POST['cod_servicio'];

		$respuesta = ModeloCambioTitular::mdlGetRefinServ($localidad,$cod_contrato,$cod_servicio);
		return $respuesta;
	}//function ctrGetRefinServ

}//class ControladorCambioTitular
?>